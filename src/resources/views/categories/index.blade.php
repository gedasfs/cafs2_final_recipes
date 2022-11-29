<x-layouts.main>
    <section>
        <h1 class="text-center mb-4">Kategorijos</h1>
        <article class="row justify-content-center">
            @foreach ($categories as $category)
                <div class="col-6 col-sm-4 col-lg-3 mb-3 d-flex justify-content-center">
                    <x-categories.card-category>
                        <x-slot:cardTitle>{{ $category->name }}</x-slot:cardTitle>
                    </x-categories.card-category>
                </div>
            @endforeach
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </article>
    </section>
</x-layouts.main>
