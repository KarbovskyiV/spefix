<!-- Vesitable Shop Start-->
<div class="container-fluid vesitable py-5">
    <div class="container py-5">
        <h1 class="mb-0">Fresh Organic Vegetables</h1>
        <div class="owl-carousel vegetable-carousel justify-content-center">

            @foreach($products as $product)
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="{{ URL('images/' . $product->photo) }}" class="img-fluid w-100 rounded-top"
                             alt="{{ $product->name }}">
                </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                         style="top: 10px; right: 10px;">
                        Vegetable
                    </div>
                    <div class="p-4 rounded-bottom">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->preview }}</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">${{ $product->price }} / kg</p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"
                               data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $product->id }}"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Detailed </a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Vesitable Shop End -->

<!-- Modal -->
@foreach($products as $product)
    <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1"
         aria-labelledby="exampleModalLabel-{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-{{ $product->id }}">Vegetable Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
