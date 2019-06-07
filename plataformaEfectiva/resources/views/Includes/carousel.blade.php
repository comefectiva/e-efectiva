        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ asset('../img/slider.png') }}">
                    <div class="carousel-caption">
                        <button type="button" class="btn btn-info">VER MAS</button>
                    </div>
                </div>

                <div class="item">
                    <img src="{{ asset('../img/slider.png') }}">
                    <div class="carousel-caption">
                        <button type="button" class="btn btn-info">VER MAS</button>
                    </div>
                </div>

                <div class="item">
                    <img src="{{ asset('../img/slider.png') }}">
                    <div class="carousel-caption">
                        <button type="button" class="btn btn-info">VER MAS</button>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>