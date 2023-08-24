@extends('User.layouts.mastes')

@section('content')

<section  id="contents-section"   >
<div class="site-blocks-cover inner-page-cover overlay mp" style="background-image: url({{ asset('assit-user/images/' . $office->image) }}); background-repeat: no-repeat; background-size: cover; background-position: center center;" data-aos="fade">

    <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
</div>
</section>
<div class="site-section" id="property-details">
    <div></div>
    <div class="container product_mainblock">
        <div class="row product_block">
            <div class="col-lg-7 h-50">
                <div class="owl-carousel slide-one-item with-dots">
                    @foreach ($images as $image)
                        <div><img style="height: 700px" src="{{ asset($image->image) }}" alt="Image"
                                class="img-fluid"></div>
                    @endforeach
                </div>
            </div>
            <section  id="servicess-section" >
            <div style="text-align: center; margin-top: 40px; " class="container-fluid bg-primary py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Service Description</h3>
                            <h6 style="font-size: larger;">Name Service: {{ $office->name }} , price : {{ $office->price }}$/M  </h6>
                            <p style="font-size: larger;">{{ $office->details }}</p>
                            <h3>Location : {{ $office->location }} </h3>
                        </div>

                    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Communicate with the Service Provider:</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>name of the service provider : {{ $user->name }} </h5>
                            {{-- <img src="{{ $user->image }}" class="img-fluid rounded-circle" alt="Service Provider Image"> --}}
                            {{-- <img src="{{ asset('assit-user/images/'. $user->image) }}" alt=" Service Provider Image"> --}}
                        </div>
                        <div class="col-md-3">
                            <h5><i class="fas fa-envelope"></i> Email:</h5>
                            <a  href="mailto:{{ $user->email }}" class="btn btn-secondary" style="background-color: #8cc641;" ><i class="fas fa-envelope"></i> {{ $user->email }}  </a>
                        </div>
                       
                        <div class="col-md-3">
                            <h5><i class="fas fa-phone"></i> Phone:</h5>
                            <a href="tel:{{ $user->mobile }}" target="_blank" class="btn btn-secondary" style="background-color: #8cc641;" >
                                <i class="fas fa-phone "></i> 077**456**
                            </a>
                        </div>
                        <div class="col-md-3">
                            <h5><i class="fab fa-whatsapp"></i> WhatsApp:</h5>
                            <a href="https://api.whatsapp.com/send?phone={{ $user->mobile }}" target="_blank"  class=" btn btn-secondary " style="background-color: #8cc641;"  ><i class="fab fa-whatsapp"></i> 077**456**</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
                    {{-- appointment section --}}
            <section  id="contacts-section" >
                    <div class="container-fluid bg-primary bg-quote " style="margin: 90px 0;   ">
          
               {{-- rate section --}}

                    <form role="form" action="{{ route('rate.store') }}" method="post">
                        @csrf
                        <div class="container">

                            {{-- Start | Fontawesome --}}
                            <div class="stars" >
                                <input type="hidden" name="rating" value="" id="rating">
                                <label for="star1" onclick="setRating(1)"><i class="fa-solid fa-star"></i></label>
                                <label for="star2" onclick="setRating(2)"><i class="fa-solid fa-star"></i></label>
                                <label for="star3" onclick="setRating(3)"><i class="fa-solid fa-star"></i></label>
                                <label for="star4" onclick="setRating(4)"><i class="fa-solid fa-star"></i></label>
                                <label for="star5" onclick="setRating(5)"><i class="fa-solid fa-star"></i></label>
                            </div>
                        </div>

                        <input type="hidden" name="office_id" value="{{ $office->id }}">

                        <div style="display: flex; justify-content: center; align-items: center; ">
                            <button style="background-color: #8cc641;   " type="submit" class="btn">Rate this service</button>
                        </div>
                    </form>
            </div>
            <div class="container-fluid bg-primary bg-quote py-5" style="margin: 90px 0;   ">
                    <div class="panel-body">
                        <div class="comment-container">
                            <div class="comment_block">
                                <h5>Add Comment</h5>
                                <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="office_id" value="{{ $office->id }}">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="2" placeholder="What are you thinking?" style="height: 100px"  ></textarea>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" name="image" id="image" class="form-control-file   btn btn-sm btn-primary ">
                                    </div> --}}
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary pull-right" type="submit" style="background-color: #8cc641"   >
                                            <i class="fa fa-pencil fa-fw"></i> Share
                                        </button>
                                    </div>
                                    <div style="display: flex; justify-content: center; align-items: center; margin: 3px auto;">
                                        <button type="button" class="btn btn-secondary" style="background-color: #8cc641;" data-toggle="modal" data-target="#commentPopup">
                                          View Comments
                                        </button>
                                      </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    
                    </div>
            </div>
        </div>
    </div>
</div>


<!-- Comment Pop-up -->
<div class="modal fade" id="commentPopup" tabindex="-1" role="dialog" aria-labelledby="commentPopupLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentPopupLabel">Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="width: 75%; margin:auto;">
                    @foreach ($comments as $comment)
                        <div class="comment-popup">
                            <div class="comment-body">
                                <div class="media-block">
                                    <a class="media-left" href="#">
                                        @if ($comment->user && $comment->user->profile_picture)
                                            <img class="img-circle img-sm" alt="Profile Picture"
                                                src="{{ asset('assit-user/images/' . $user->image) }}"
                                                style="width: 50px; height: 50px; border-radius: 50%;">
                                        @else
                                            <img class="img-circle img-sm" alt="Profile Picture"
                                                src="{{ asset('images/profile/default-profile-picture.jpg') }}"
                                                style="width: 50px; height: 50px; border-radius: 50%;">
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <div class="mar-btm">
                                            @if ($comment->user)
                                                <a href="#"
                                                    class="btn-link text-semibold media-heading box-inline">{{ $comment->user->name }}</a>
                                            @else
                                                <span class="text-semibold">User not found</span>
                                            @endif
                                            <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i>{{ $comment->created_at->diffForHumans() }}</p>
                                        </div>
                                        <h6>{{ $comment->message }}</h6>
                                        @if ($comment->rate)
                                        <h3>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $comment->rate)
                                                    <i class="fa-solid fa-star" style="color: #ffd43b;"></i>
                                                @else
                                                    <i class="fa-regular fa-star"></i>
                                                @endif
                                            @endfor
                                        </h3>
                                    @endif
                                    

                                        
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script>




function setRating(rating) {
document.getElementById('rating').value = rating;
                    }
// ALL Stars to NodeList 
let stars = document.querySelectorAll(".stars i");



// Loops through star NodeList
 stars.forEach((star, index1) => {
    // Function when click events triggers
     star.addEventListener("click", () => {
        // Loop through stars NodeList again
         stars.forEach((star, index2) => {
            // Adding Color Stars
             if (index1 >= index2) {
star.classList.add("color-star");
} else {
star.classList.remove("color-star");
}
});
});
});

</script>
@endsection

