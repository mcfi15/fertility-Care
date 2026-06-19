<!-- Modal Search Start -->

 <!-- Modal Search Start -->
 <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('search') }}" method="GET">
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" name="search" value="{{ Request::get('search') }}" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <button type="submit" id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Search End -->

{{-- <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('search') }}" method="GET">
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    
                        <input type="search" name="search" value="{{ Request::get('search') }}" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <button type="submit" id="search-icon-1" class="input-group-text btn border p-3">
                        <i class="fa fa-search text-white"></i></button>
                    
                </div>
            </div>
        </form>
        </div>
    </div>
</div> --}}
<!-- Modal Search End -->