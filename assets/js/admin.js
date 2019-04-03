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
      document.querySelector("#pesquisar").value.replace(" ", "+") +
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

var checkedRows = [];

$("#table").on("check.bs.table", function(e, row) {
  checkedRows.push({
    poster: row.Poster,
    name: row.Title,
    description: row.Year,
    id: row.imdbID
  });
});

$("#table").on("uncheck.bs.table", function(e, row) {
  $.each(checkedRows, function(index, value) {
    if (value.name === row.Title) {
      checkedRows.splice(index, 1);
    }
  });
});

function enviar(id) {
  var request = $.ajax({
    type: "POST",
    url: "http://localhost/Ficha1/database/searchIMDB.php",
    data: {
      movie_name: id
    },
    dataType: "html"
  });
}

$("#add_cart").click(function() {
  $.each(checkedRows, function(index, value) {
    enviar(value.id);
  });
});

window.operateEvents = {
  "click .add_button": function(e, value, row, index) {
    console.log(row["imdbID"]);
    enviar(row["imdbID"]);
  }
};

function operateFormatter(value, row, index) {
  return [
    '<button type="button" class="btn btn-primary add_button">Add</button>'
  ].join("");
}
