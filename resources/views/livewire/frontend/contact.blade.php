<div>
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 h-100 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                        <h4 class="text-uppercase text-primary">Let’s Connect</h4>
                        <h1 class="display-3 text-capitalize mb-3">Send Your Message</h1>
                        
                    </div>
                    @include('layouts.alert.msg')
                    <form wire:submit.prevent="send" method="post">
                        <div class="row g-4">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" name="name" wire:model.live="name" class="form-control border-0" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>  
                                @enderror
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" name="email" wire:model.live="email" class="form-control border-0" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>  
                                @enderror
                            </div>
                            
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" wire:model.live="subject" class="form-control border-0" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                                @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>  
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0" name="message" wire:model.live="message" placeholder="Leave a message here" id="message" style="height: 175px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                                @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>  
                                @enderror
                            </div>
                            <div class="col-12">
                                <div wire:loading wire:target="send">
                                    <img src="{{ asset('uploads/img/load.gif') }}" width="40" alt="">
                                </div>
                                <button wire:loading.attr="disabled" wire:loading.remove wire:target="send" type="submit" class="btn btn-primary w-100 py-3">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="d-inline-flex rounded bg-white w-100 p-4">
                                <i class="fas fa-map-marker-alt fa-2x text-secondary me-4"></i>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-0">{{ $appSetting->address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="d-inline-flex rounded bg-white w-100 p-4">
                                <i class="fas fa-envelope fa-2x text-secondary me-4"></i>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-0">{{ $appSetting->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="d-inline-flex rounded bg-white w-100 p-4">
                                <i class="fa fa-phone-alt fa-2x text-secondary me-4"></i>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-0">{{ $appSetting->phone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="h-100 overflow-hidden">
                                <iframe class="w-100 rounded" style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd" 
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
