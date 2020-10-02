var i = 0;
var images = [];

var imgFolder = 'cafelunchMenu/';
for (let index = 0; index < 10; index++) {
    images[index] = imgFolder + (index+1) + '.jpg';
    console.log(images[index]);
}

document.slide.src = images[i]

function nextImg(){

    if(i < images.length - 1){
        i++;
    }else{
        i = 0;
    }
    document.slide.src = images[i]
    console.log(images[i]);
}

function prevImg(){
    
    console.log(i);

    if(i == images.length - 1){
        i--;
    }
    else if(i <= 0){
        i = images.length - 1;
    } else{
        i--;
    }
    document.slide.src = images[i]
    console.log(images[i]);
    console.log(i);
}

