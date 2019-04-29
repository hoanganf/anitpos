<div id="navbar" class="navbar">
  <a id="p_order" <?php if($resource->isOrder){ ?>class="active" <?php }?> href="?pageId=order">Goi mon</a>
  <a id="p_cashier" <?php if($resource->isCashier){ ?>class="active" <?php }?> href="?pageId=cashier">Thanh toan</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown</button>
    <div class="dropdown-content">
      <a href="?pageId=product" <?php if($resource->isProduct){ ?>class="active" <?php }?> >Quan ly san pham</a>
      <a href="?pageId=category">Quan ly danh muc</a>
      <a href="?pageId=product_unit">Quan ly don vi san pham</a>
      <a href="?pageId=ingredient_unit">Quan ly don vi nguyen lieu</a>
      <a href="#">Link 3</a>
    </div>
  </div>
</div>
