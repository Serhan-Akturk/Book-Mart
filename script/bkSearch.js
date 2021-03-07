jQuery(document).ready(function(){

    $('#orderBk').on('click',function(){
        bookSearch();
    });
});


function bookSearch(){
    var search = document.getElementById('order-name').value;
    document.getElementById('orders').innerHTML = ""
    console.log(search);
    

    $.ajax({
        url: "https://www.googleapis.com/books/v1/volumes?q=" + search,
        dataType: "json",

        success:function(data){
            console.log(data)
            for( i  = 0;i<data.items.length;i++){
                orders.innerHTML+="<p> "+"<img src =" + data.items[i].volumeInfo.imageLinks.thumbnail+" alt= thumbnail>"+" "+ data.items[i].volumeInfo.title+", "+data.items[i].volumeInfo.categories+", "+"<i> Written by </i>"+ data.items[i].volumeInfo.authors
                +"<a href = "+data.items[i].accessInfo.webReaderLink+" target=_blank> Read </a>" + " " +" <a href = "+data.items[i].saleInfo.buyLink +"target=_blank> Buy</a>" +"</p>";
            }
        },
        
        type: 'GET'
    });

}
