<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center"
            data-background="{{ asset('client/assets/img/hero/h1_hero.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-9 col-md-10">
                        <div class="hero__caption">
                            <h1>Tìm Kiếm việc làm phù hợp với bạn</h1>
                        </div>
                    </div>
                </div>
                <!-- Search Box -->
                <div class="row">
                    <div class="col-xl-8">
                        <!-- form -->
                        <form action="{{ route('client.jobs') }}" id="form-search" method="GET" class="search-box">
                            <div class="input-form">
                                <input type="text" name="q" placeholder="Tìm Kiếm">
                            </div>
                            <div class="select-form">
                                <div class="select-itms">
                                    <select name="c" id="select1">
                                        <option value="">Mọi Nơi</option>
                                        <option value="Hà Nội">Hà Nội</option>
                                        <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                        <option value="Đà Nẵng">Đà Nẵng</option>
                                        <option value="Bắc Giang">Bắc Giang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-form">
                                {{-- <button>Tìm Kiếm</button> --}}
                                <a href="#" onclick="ProcessSeach()">Tìm Kiếm</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>