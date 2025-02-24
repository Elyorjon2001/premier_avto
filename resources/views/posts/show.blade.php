<x-layouts.main>
    <x-layouts.page-header>
        Avtomobillar
    </x-layouts.page-header>

    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <h1 class="display-4 text-uppercase mb-5">{{ $post->name }}</h1>
                    @if(session('authenticated_admin'))
                        <a class="btn btn-sm btn-outline-dark mr-2" href="{{ route('posts.edit', ['post' => $post->id]) }}">
                            O'zgartirish
                        </a>
                        
                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" onsubmit="return confirm('Ushbu post ochirilsinmi?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">O'chirish</button>
                        </form>
                    @endif

                    <div class="container mt-5">
                        <div class="row mx-n2 mb-3">
                            @foreach(json_decode($post->photo) as $image)
                                <div class="col-md-3 col-6 px-2 pb-2">
                                    <img class="img-fluid w-100" 
                                         src="{{ asset('storage/' . $image) }}" 
                                         alt="rasm bor" 
                                         data-toggle="modal" 
                                         data-target="#imageModal" 
                                         data-img="{{ asset('storage/' . $image) }}"
                                         data-index="{{ $loop->index }}"  
                                         data-total="{{ count(json_decode($post->photo)) }}">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel">Rasm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img id="modalImage" class="img-fluid w-100" src="" alt="rasm">
                                </div>
                                <div class="modal-footer">
                                    <button id="backBtn" class="btn btn-secondary" data-dismiss="modal">Orqaga</button>
                                    <button id="prevBtn" class="btn btn-secondary" ><</button>
                                    <button id="nextBtn" class="btn btn-secondary">></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>{{ $post->about_car }}</p>
                    <div class="row pt-2">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-car text-primary mr-2"></i>
                            <span>{{ $post->name }}</span>
                            <span>{{ $post->year }}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-cogs text-primary mr-2"></i>
                            <span>{{ $post->karopka }}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-road text-primary mr-2"></i>
                            <span>{{ $post->road }}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-eye text-primary mr-2"></i>
                            <span>Video Registrator</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

    <script>
        $(document).ready(function() {
            let currentIndex = 0;
            let totalImages = 0;
            let images = [];
    
            $('#imageModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                currentIndex = button.data('index');
                totalImages = button.data('total');
    
                images = [];
                $('img[data-toggle="modal"]').each(function() {
                    images.push($(this).data('img'));
                });
    
                $(this).find('#modalImage').attr('src', images[currentIndex]);
            });
    
            $('#prevBtn').click(function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    $('#modalImage').attr('src', images[currentIndex]);
                }
            });
    
            $('#nextBtn').click(function() {
                if (currentIndex < totalImages - 1) {
                    currentIndex++;
                    $('#modalImage').attr('src', images[currentIndex]);
                }
            });
    
            // Orqaga tugmasi - modalni yopish
            $('#backBtn').click(function() {
                $('#imageModal').modal('hide');
            });
        });
    </script>
    
</x-layouts.main>
