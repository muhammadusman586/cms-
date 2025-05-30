<?php
namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Permission;

class TenantController extends Controller
{

    public function redirectToTenant(Request $request)
    {
        $domain = $request->get('domain');
        // dd($domain);

        $tenant = DB::table('tenants')
            ->join('domains', 'tenants.id', '=', 'domains.tenant_id')
            ->where('domains.domain', $domain)
            ->select('tenants.email', 'domains.domain')
            ->first();

        if (! $tenant) {
            abort(404);
        }

        $signedUrl = URL::temporarySignedRoute(
            'tenant.auto.login',
            now()->addMinutes(30),
            ['email' => $tenant->email]
        );

        $path  = parse_url($signedUrl, PHP_URL_PATH);
        $query = parse_url($signedUrl, PHP_URL_QUERY);

        $fullTenantUrl = 'http://' . $tenant->domain . $path . '?' . $query;

        return redirect()->away($fullTenantUrl);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenants = DB::table('tenants')
            ->leftJoin('domains', 'tenants.id', '=', 'domains.tenant_id')
            ->select('tenants.id', 'tenants.name as tenant_name', 'domains.domain')
            ->get();
        // dd($tenants);

        return view('pages.tenant.create', ['tenants' => $tenants]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Create the user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // $tenantRole=Role::create(['name'=>'tenant']);
        // $viewPermission=Permission::create(['name'=>'view articles']);
        // $tenantRole=Role::findById(3);
        // $tenantRole->givePermissionTo($viewPermission);

        // $tenantRole=Role::findById(3);
        // $viewPermission=Permission::findById(1);
        // $tenantRole->givePermissionTo($viewPermission);

        $user->assignRole('tenant');

        // dd($user);
        // dd($user->id);

        $tenant = Tenant::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'user_id'  => $user->id,
        ]);

        // $tenant=Tenant::create($request->input());
        if (! $tenant) {
            abort(404, 'Tenant is not Created');
        }

        // dd($tenant);

        // Add a domain for the tenant
        $tenant->domains()->create([
            'domain' => $tenant->name . '.cms.test',
        ]);

        return redirect('/tenant')->with('success', 'Tenant and user created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tenantId)
    {
        $tenant      = Tenant::find($tenantId);
        $permissions = Permission::pluck('name');

        if (! $tenant) {
            return redirect()->back()->with('error', 'Tenant not found.');
        }

        return view('pages.tenant.edit', ['tenant' => $tenant, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $tenantId)
    {
        // dd($tenantId);
        // dd($request);

        // $request->validate([
        //     'name'     => 'sometimes|string',
        //     'email'    => 'sometimes|email|unique:users,email,',
        //     'password' => 'sometimes|min:6',
        // ]);
        // 


        $tenant = Tenant::findOrFail($tenantId);
        $userId = $tenant->user_id;
        $user   = User::findOrFail($userId);

        $user->name  = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        // dd("Before Permission");

        if ($request->has('permission')) {
            $user->syncPermissions($request->permission);
            // dd("Done");
        }
        // dd("Done");
     
        $tenant->name  = $request->name;
        $tenant->email = $request->email;
        if ($request->filled('password')) {
            $tenant->password = Hash::make($request->password);
        }
        $tenant->save();

        // Update tenant domain
        $tenant->domains()->update([
            'domain' => $tenant->name . '.cms.test',
        ]);

        return redirect('/tenant')->with('success', 'Tenant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
