<div>
    <div class="py-3 py-md-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if ($product->images)
                         <img src="{{ asset($product->image) }}" class="w-100" alt="Image">
                         @endif
                        
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->title }}
                            
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->title }}
                        </p>
                        <h6>{{ $product->product_code }}</h6>
                        <div>
                            <span class="selling-price">&#x52;{{ number_format($product->price, 2) }}</span>
                        </div>
                        {{-- <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" />

                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div> --}}
                        <div class="mt-2">
                            {{-- <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a> --}}
                            <a href="{{ url('place-order/'.$product->category->slug.'/'.$product->slug) }}"  class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">Place Order Now </a>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 mt-3">
                    
                    <div class="card">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Images</a>
                            </li>
                            {{-- <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                            </li> --}}
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">{{ $product->description }}</div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @if ($product->images)
                                <div class="row">
                                    @forelse ($product->images as $image)
                                    <div class="col-md-2">
                                        <img src="{{ asset("$image->images") }}" alt="Images" style="width:170px; height:150px;" class="me-4 border">
                                        
                                    </div>
                                    @empty   
                                    <span style="color: red;">No Image Added</span>
                                    @endforelse
                                </div>
                                @endif
                            </div>
                            {{-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> --}}
                          </div>
                        

                          <!-- Modal -->



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
