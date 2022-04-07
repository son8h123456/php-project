<script>
      function searchFocus() {
        if(document.searchForm.searchText.value == "Tìm kiếm sản phẩm") {
            document.searchForm.searchText.value = "";
        }
    }
      function searchBlur() {
        if(document.searchForm.searchText.value == " ") {
            document.searchForm.searchText.value = "Tìm kiếm sản phẩm";
        }
    }

</script>

<form class="d-flex" method="post" name="searchForm" action="index.php?page_layout=danhsachtimkiem" >
    <input onfocus="searchFocus()" onblur="searchBlur()" class="form-control me-2 " type="text" name="searchText" value="Tìm kiếm sản phẩm..." style="width: 300px; color: #837e8b">
    <button  class="btn btn-outline-success " type="submit" ><i class="fa fa-search"></i>Tìm kiếm</button>
</form>