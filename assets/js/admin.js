document.querySelector("#search-icon").addEventListener("click", function() {
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myArr = JSON.parse(this.responseText).Search;
      loadMovies(myArr);
    }
  };
  xmlhttp.open(
    "GET",
    "http://www.omdbapi.com/?s=" +
      document
        .querySelector("#pesquisar")
        .value.replace(new RegExp(" ", "g"), "+") +
      "&apikey=a4c49050",
    true
  );
  xmlhttp.send();
});

function loadMovies(myArr) {
  $(function() {
    $("#table").bootstrapTable({
      data: myArr
    });
  });
}

function imageFormatter(value, row) {
  return '<img  src="' + value + '" height="100" width="100"/>';
}

function enviar(id) {
  window.location.href = "./Movie/insertMovieC/?id=" + id;
}

window.operateEvents = {
  "click .add_button": function(e, value, row, index) {
    enviar(row["imdbID"].replace(new RegExp(" ", "g"), ""));
  }
};

function operateFormatter(value, row, index) {
  return [
    '<button type="button" class="btn btn-primary add_button">Add</button>'
  ].join("");
}
