window.addEventListener('load',function(){
    new Glider(document.querySelector('.carousel__lista'),{
        slidesToShow: 4,
        slidesToScroll: 3,
        
        arrows: {
            prev: '.carousel__anterior',
            next: '.carousel__siguiente'
        }
    })
});

