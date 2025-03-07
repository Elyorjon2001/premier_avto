<x-layouts.main>

    <x-layouts.page-header>
        Yangi Avtomabil qo'shish
    </x-layouts.page-header>


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Avtomabil malumotlarini kiriting</h1>
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
                        <form action="{{ route('posts.store') }}" method="Post" class="createForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name='name' value="{{ old('name') }}"  placeholder="Avtomabil nomi" required="required">
                                    @error('name')
                                    <p class="help-block text-danger">{{ $message }}</p> 
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name='year' value="{{ old('year') }}" placeholder="Avtomabil Yili" required="required">
                                    @error('year')
                                    <p class="help-block text-danger">{{ $message }}</p> 
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" name='road' value="{{ old('road') }}" placeholder="Bosib o'tgan masofasi" required="required">
                                @error('road')
                                <p class="help-block text-danger">{{ $message }}</p> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" name='karopka' value="{{ old('karopka') }}" placeholder="Uzatmalar qutisi" required="required">
                                @error('karopka')
                                <p class="help-block text-danger">{{ $message }}</p> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control p-4" name="photo[]" placeholder="Rasmlar" multiple>
                                @error('photo')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" rows="5" name='about_car' value="{{ old('about_car') }}" placeholder="Avtomabil haqida to'liq malumot" required="required"></textarea>
                                @error('about_car')
                                <p class="help-block text-danger">{{ $message }}</p> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" name='tan_narx' value="{{ old('tan_narx') }}" placeholder="Tan narxi" required="required">
                                @error('tan_narx')
                                <p class="help-block text-danger">{{ $message }}</p> 
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">qoshish</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-2">
                    <div class="bg-secondary d-flex flex-column justify-content-center px-5 mb-4" style="height: 435px;">
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Bizning manzil</h5>
                                <p>Toshkent,Yangi Sergeli ko'chasi 56-uy</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">elektron manzil</h5>
                                <p>premieravtocity@example.com</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="mt-n1">
                            <i class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>
                                <h5 class="text-light">Return & Refund</h5>
                                <p class="m-0">+012 345 67890</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

</x-layouts.main>
