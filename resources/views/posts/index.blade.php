<x-layouts.main>

    <x-layouts.page-header>
        Avtomabillar
    </x-layouts.page-header>

    <!-- Rent A Car Start --> 
    
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">03</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Sizni Qiziqtirgan Avtomabil haqida malumotga ega boling
            </h1>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        {{-- Rasm yo'llarini olish va tekshirish --}}
                        @php
                            $photos = json_decode($post->photo);
                            $firstPhoto = is_array($photos) && count($photos) > 0 ? $photos[0] : null;
                        @endphp
                        
                        {{-- Agar rasm mavjud bo'lsa, ko'rsatish --}}
                        @if ($firstPhoto)
                            <img class="img-fluid mb-4" src="{{ asset('storage/' . $firstPhoto) }}" alt="rasm bor">
                        @else
                            <img class="img-fluid mb-4" src="{{ asset('storage/default-image.png') }}" alt="default rasm">
                        @endif
                        
                        <h4 class="text-uppercase mb-4">{{ $post->name }}</h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span>{{ $post->year }}</span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span>{{ $post->karopka }}</span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-money-check-alt text-primary"></i>
                                <span>{{ $post->tan_narx }}</span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span>{{ $post->road }}</span>
                            </div>
                        </div>
                        <a class="btn btn-primary px-3" href="{{ route('posts.show', ['post' => $post->id]) }}">oqish</a>
                    </div>
                @endforeach
            </div>
            
            {{ $posts->links() }}
        </div>
        
    </div>



</x-layouts.main>
