<?= $this->extend('Component/user.php') ?>
<?= $this->section('Content') ?>
<div class="container py-3">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/Asset/banner.png" class="d-block w-100 rounded" alt="...">
                <div class="carousel-caption d-none d-md-block text-light">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/Asset/banner.png" class="d-block w-100 rounded" alt="...">
                <div class="carousel-caption d-none d-md-block text-light">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/Asset/banner.png" class="d-block w-100 rounded" alt="...">
                <div class="carousel-caption d-none d-md-block text-light">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="d-flex justify-content-evenly my-4">
        <div class=" text-center p-2">
            <h5>30</h5>
            <p>Coffee variant</p>
        </div>
        <div class="vr my-4"></div>
        <div class=" text-center p-2">
            <h5>20</h5>
            <p>Meeting Room</p>
        </div>
        <div class="vr my-4"></div>
        <div class=" text-center p-2">
            <h5>25</h5>
            <p>Event Space</p>
        </div>
    </div>

    <div id="choose-us" class="rounded text-light background-black d-flex flex-column align-items-center text-center p-4">
        <h4 class="pt-5">Why choose us?</h4>
        <p class="fs-7 w-75 mt-3">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, qui.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam dignissimos a corporis id sunt? Corrupti autem reprehenderit dignissimos exercitationem aut?
        </p>
        <div class="row w-100 service">
            <div class="col-12 col-md-4 mb-2">
                <div class="background-brown rounded p-3">
                    <i class="bi bi-cup-hot-fill fs-2"></i>
                    <h5>Best Quality</h5>
                    <p class="fs-7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, sequi!</p>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-2">
                <div class="background-brown rounded p-3">
                    <i class="bi bi-cup-hot-fill fs-2 mb-5"></i>
                    <h5>Best Quality</h5>
                    <p class="fs-7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, sequi!</p>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-2">
                <div class="background-brown rounded p-3">
                    <i class="bi bi-cup-hot-fill fs-2"></i>
                    <h5>Best Quality</h5>
                    <p class="fs-7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, sequi!</p>
                </div>
            </div>
        </div>
    </div>

    <div id="rekomended">
        <div class="rekomended-title mb-4">
            <h4>RECOMMENDED</h4>
            <p class="fs-7">Loremolorum dolor necessitatibus quasi explicabo est? Labore provident necessitatibus tenetur eaque.</p>
        </div>
        <div class="rekomended-content mb-3">
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <div class="card background-yellow border-0 me-3" style="min-width: 250px; width:250px;">
                    <img src="/Asset/coffee.png" class="card-img-top" alt="...">
                    <div class="card-body position-relative p-2">
                        <div class="d-flex justify-content-between">
                            <p class="card-title text-dark fs-7 fw-medium text-break">Capucino</p>
                            <p class="card-text fs-7 text-dark">RP.20.000</p>
                        </div>
                        <a href="#" class="button-primary w-100">Detail</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <div id="review">
        <div class="review-title mb-4">
            <h4>What our buyers say</h4>
            <p class="fs-7">Loremolorum dolor necessitatibus quasi explicabo est? Labore provident necessitatibus tenetur eaque.</p>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card mb-3" style="max-width: 100rem;">
                        <div class="card-header d-flex align-items-center">
                            <img src="/Asset/profil.png" class="d-block rounded-circle me-2">
                            <div>
                                <h6>Bagaskara</h6>
                                <div>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Comment :</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card mb-3" style="max-width: 100rem;">
                        <div class="card-header d-flex align-items-center">
                            <img src="/Asset/profil.png" class="d-block rounded-circle me-2">
                            <div>
                                <h6>Daus</h6>
                                <div>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Comment :</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card mb-3" style="max-width: 100rem;">
                        <div class="card-header d-flex align-items-center">
                            <img src="/Asset/profil.png" class="d-block rounded-circle me-2">
                            <div>
                                <h6>Jokowi</h6>
                                <div>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Comment :</h5>
                            <p class="card-text">Some Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis assumenda sit quia architecto nihil officiis possimus eveniet amet, nostrum ullam sequi illo quibusdam voluptate eum magnam corrupti, ab rerum saepe!quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?= $this->endSection() ?>