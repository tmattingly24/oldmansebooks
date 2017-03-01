$(document).ready(function () {

    var form = document.getElementById("addInv");

    form.onsubmit = function (event) {

        var photos = [];
        event.preventDefault();
        var fileSelect = document.getElementById("fileSelect");
        var files = fileSelect.files;
        var j = 0;


        for (var i = 0; i < files.length; i++) {


            var valid = isValid(files[i]);
            if (valid) {

                photos[j] = files[i];
                j++;

            }
        }

        if (photos.length == files.length && photos.length != 0) {


            uploadPhotos(photos);

        } else {
            alert("error");
        }


    }

});

function isValid(file) {

    var sFileName = file.name;
    var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
    var sFileSize = file.size;

    if (sFileExtension == "jpg" || sFileExtension == "png" || sFileExtension == "gif" || sFileExtension == "jpeg") {

        if (sFileSize < 1000000) {

            return true;
        }

    }

}

function saveBook(book) {

    var http = new XMLHttpRequest();
    var url = "saveBook.php";
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    http.onreadystatechange = function () { //Call a function when the state changes.


        if (http.readyState == 4 && http.status == 200) {

            alert(http.responseText);
        }
    }
    var sbook = JSON.stringify(book);
    http.send("book=" + sbook);

}


function createBook(photos) {

    var genre = document.getElementById("genre").value;
    var title = document.getElementById("title").value;
    var isbn = document.getElementById("isbn").value;
    var author = document.getElementById("author").value;
    var publisher = document.getElementById("publisher").value;
    var pubDate = document.getElementById("pubDate").value;;
    var price = document.getElementById("price").value;
    var condition = document.getElementById("condition").value;
    var edition = document.getElementById("edition").value;
    var binding = document.getElementById("binding").value;
    var description = document.getElementById("description").value;


    var book = {
        title: title,
        genre: genre,
        isbn: isbn,
        author: author,
        publisher: publisher,
        pubDate: pubDate,
        price: price,
        condition: condition,
        edition: edition,
        binding: binding,
        description: description
    };

    saveBook(book);

}

function uploadPhotos(photos) {

    var formData = new FormData();
    var file = photos[0];
    formData.append('fileToUpload', file, file.name);
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'upload.php', true);
    xhr.onload = function () {

        if (xhr.status === 200) {

            alert(xhr.responseText);

        } else {

            alert('An error occurred!');

        }
    };

    xhr.send(formData);

}