<x-layout.app>





    <section class="py-16 px-4 max-w-4xl mx-auto">

        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <a href="/author"
                class="px-4 py-2 rounded-full bg-rose-600 text-white font-medium hover:bg-rose-700 transition-colors">
                Author
            </a>
            <a href="/category"
                class="px-4 py-2 rounded-full bg-rose-600 text-white font-medium hover:bg-rose-700 transition-colors">
                Category
            </a>
        </div>
        <h2 class=""> Categories</h2>

        @foreach ($categories as $categorie)
         <p>{{$categorie}}</p>        
        @endforeach
     
    </section>

    


    
</x-layout.app>
