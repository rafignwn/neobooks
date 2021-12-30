
</div>
<div class="my-footer">
    <p>Copyright &copy; Neobooks 2021</p>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/user/js/bootstrap.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<!-- Sweet Alert 2 -->
<script src="<?= base_url('assets/vendor/sweetalert/package/dist/'); ?>sweetalert2.all.min.js"></script>
<script>
    $('.alert').alert().delay(3000).slideUp('slow');
    </script>
<!-- My Javascript -->
<!-- navbar sticky -->
<script>
    let navbar_sticky = document.querySelector("nav.navbar");
    const sticky = navbar_sticky.offsetTop;
    
    window.onscroll = () => {
        if (window.scrollY >= sticky) {
            navbar_sticky.classList.add('sticky');
        } else if (window.scrollY <= sticky) {
            navbar_sticky.classList.remove('sticky');
        }
    }
</script>
<!-- end navbar sticky -->
<script>
    // toggle navbar
    let nav = document.querySelector("nav.navbar")
    let link = document.querySelectorAll(".navbar-nav a");
    let nav_collapse = document.querySelector(".my-navbar-collapse");
    const toggler = document.querySelector("#toggler");

    toggler.onclick = function() {
        nav.classList.toggle("show");
        nav_collapse.classList.toggle("show");
    }
    
    for (let c = 0; c < link.length; c++) {
        link[c].onclick = function() {
            nav_collapse.classList.remove("show");
        }
    }
    // end toggle navbar

    // notif booking
    let notif = document.querySelector(".navbar-nav > a.booking > abbr > span");
    
    if (notif != null) {
        if (notif.innerHTML == 0) {
            notif.style.display = "none";
        }
    }
    // end notf booking

    // show and hide password
    let showPw = document.querySelectorAll(".input-box .show-pass");
    const pass = document.querySelector("#password");
    const createPw = document.querySelector("#password1");
    const confirmPw = document.querySelector("#password2");
    
    for(let d = 0; d < showPw.length; d++){
        showPw[d].onclick = function() {
            if (pass.type == "password" || (createPw.type == "password" & confirmPw.type == "password")) {
                pass.type = "text";
                createPw.type = "text";
                confirmPw.type = "text";
                showPw[d].classList.replace("fa-eye-slash", "fa-eye");
            } else {
                pass.type = "password";
                createPw.type = "password";
                confirmPw.type = "password";
                showPw[d].classList.replace("fa-eye", "fa-eye-slash");
            }
        }
    }
    // end show and hide password
    
    // dropdown user information
    const dropdownUser = document.querySelector("[data-Mydropdown]");

    dropdownUser.onclick = function() {
        dropdownUser.classList.toggle("active");
    }
    document.addEventListener("click", e => {
        const isDropdownButton = e.target.matches("[data-Mydropdown-button]");
        if (!isDropdownButton && e.target.closest("[data-Mydropdown]") != null) return
        
        let currentDropdown;
        if(isDropdownButton) {
            currentDropdown = e.target.closest("[data-Mydropdown]");
            currentDropdown.classList.toggle("active");
        }
        
        document.querySelectorAll("[data-Mydropdown].active").forEach(dropdown => {
            if(dropdown === currentDropdown) return
            dropdown.classList.remove("active");
        });
    });
    // end dropdown user information

    // delete confirmation
    document.querySelectorAll(".delete-booking").forEach(deleteBooking => {
        deleteBooking.addEventListener("click", e => {
            const linkDelete = e.currentTarget.href;
            e.preventDefault();
            // console.log(linkDelete);
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Buku akan dihapus dari kranjang booking!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = linkDelete;
                }
            })
        })
    })
    // end delete confirmation
</script>
<!-- End My Javasript -->

<?= $this->session->flashdata('pesan_sweetalert') ?>
</body>
</html>