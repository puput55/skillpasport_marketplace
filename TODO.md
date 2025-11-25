# TODO - Show Products According to Logged-in Member

- [x] Add memberProduk() method in ProdukController.php
  - Get logged in user
  - Get user's toko
  - Retrieve produk for toko
  - Pass produk to 'produk' view

- [x] Ensure /member/produk route points to memberProduk method with middleware 'auth' and 'checkRole:member'

- [x] Use existing resources/views/produk.blade.php to display produk list

- [ ] Test as member login:
  - Access /member/produk route
  - Verify only produk from member's toko is shown
  - Verify "Lihat Produk" button works and shows product detail

- [ ] If needed, add error handling or message if member has no toko/products

- [ ] Confirm role based access to routes for member only

- [ ] Final acceptance testing
