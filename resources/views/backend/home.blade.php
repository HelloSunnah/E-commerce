@extends("backend.master")

@section("content")
    <div class="row">
        <div class="col-md mb-4">
            <div class="card border-0 rounded-4">
                <div class="card-body py-4 rounded-4 shadow d-flex align-items-center">
                    <div class="bg-success shadow bg-gradient rounded-3 text-white p-2 me-3">
                        <i class="fa fa-list h2 m-0"></i>
                    </div>
                    <div>
                        <h2 class="m-0">0</h2>
                        <h5 class="m-0">Total Products </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md mb-4">
            <div class="card border-0 rounded-4">
                <div class="card-body py-4 rounded-4 shadow d-flex align-items-center">
                    <div class="bg-success shadow bg-gradient rounded-3 text-white p-2 me-3">
                        <i class="fa fa-list h2 m-0"></i>
                    </div>
                    <div>
                        <h2 class="m-0">0</h2>
                        <h5 class="m-0"> Order <small> (Hold)</small> </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md mb-4">
            <div class="card border-0 rounded-4">
                <div class="card-body py-4 rounded-4 shadow d-flex align-items-center">
                    <div class="bg-success shadow bg-gradient rounded-3 text-white p-2 me-3">
                        <i class="fa fa-list h2 m-0"></i>
                    </div>
                    <div>
                        <h2 class="m-0">0</h2>
                        <h5 class="m-0"> Order <small>( Processing)</small> </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md mb-4">
            <div class="card border-0 rounded-4">
                <div class="card-body py-4 rounded-4 shadow d-flex align-items-center">
                    <div class="bg-success shadow bg-gradient rounded-3 text-white p-2 me-3">
                        <i class="fa fa-list h2 m-0"></i>
                    </div>
                    <div>
                        <h2 class="m-0">0</h2>
                        <h5 class="m-0"> Order <small>(Completed)</small> </h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection