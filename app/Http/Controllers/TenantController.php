<?php
namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

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
            ->select('tenants.name as tenant_name', 'domains.domain')
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
