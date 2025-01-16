// NAVBAR
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementsByTagName("nav")[0];
    const navbarToggler = document.querySelector('.navbar-toggler');

    // Scroll event listener
    window.addEventListener("scroll", function () {
        if (window.scrollY > 1) {
            navbar.classList.replace("bg-transparent", "nav-color");
        } else {
            navbar.classList.replace("nav-color", "bg-transparent");
        }
    });

    // Toggle button click event
    navbarToggler.addEventListener('click', function () {
        if (navbar.classList.contains('bg-transparent')) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('nav-color');
        } else {
            navbar.classList.remove('nav-color');
            navbar.classList.add('bg-transparent');
        }
    });
});



// AKHIR NAVBAR

// MODAL set Lama Hari
window.addEventListener('DOMContentLoaded', function () {
    var lamaHariElements = document.getElementsByName("lamaHari");
    var lamaHari = document.getElementsByName("lama")[0].value;
    
    for (var i = 0; i < lamaHariElements.length; i++) {
        lamaHariElements[i].value = lamaHari;
    }
});

// MODAL set Capacity PAX
window.addEventListener('DOMContentLoaded', function () {
    var selectElements = document.querySelectorAll('.select-dropdown');
    
    selectElements.forEach(function (selectElement) {
        var ketKapasitas = document.querySelector(selectElement.getAttribute('data-target'));
        var ketCukup = document.querySelector(selectElement.getAttribute('data-target2'));
        var btnCart = document.querySelector(selectElement.getAttribute('data-target3'));
        var btnReservasi = document.querySelector(selectElement.getAttribute('data-target4'));
        var pesertaInput = document.getElementById('peserta-cek');
        var pesertaValue = pesertaInput.value;

        selectElement.addEventListener('change', function () {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var kapasitas_ruang = selectedOption.getAttribute('data-value');
            ketKapasitas.value = kapasitas_ruang;

            // jika kapasitas bisa menampung jumlah peserta
            if (kapasitas_ruang >= parseInt(pesertaValue)) {
                ketKapasitas.classList.add('border', 'border-success');
                ketKapasitas.classList.remove('border', 'border-danger');
                ketCukup.style.color = 'green';
                ketCukup.textContent = 'Kapasitas mencukupi untuk jumlah peserta (' + pesertaValue + ')';
                ketCukup.hidden = false;
                btnCart.disabled = false;
                btnReservasi.disabled = false;
            } else {
                ketKapasitas.classList.add('border', 'border-danger');
                ketKapasitas.classList.remove('border', 'border-success');
                ketCukup.style.color = 'red';
                ketCukup.textContent = 'Kapasitas tidak mencukupi untuk jumlah peserta (' + pesertaValue + ')';
                ketCukup.hidden = false;
                btnCart.disabled = true;
                btnReservasi.disabled = true;
            }
        });
    });
});

// jam Selesai otomatis 8 jam setelah jam Mulai
// Get all the input elements with the name 'jam_mulai' and 'jam_selesai'
const jamMulaiInputs = document.querySelectorAll('[name="jam_mulai"]');
const jamSelesaiInputs = document.querySelectorAll('[name="jam_selesai"]');

// Add event listeners to the 'jamMulaiInputs' for change events
jamMulaiInputs.forEach(function(jamMulaiInput, index) {
    jamMulaiInput.addEventListener('change', function() {
        // Get the selected time from the current 'jamMulaiInput'
        const jamMulaiValue = jamMulaiInput.value;

        // Calculate the time 8 hours after 'jamMulaiValue'
        const jamSelesaiValue = calculateJamSelesai(jamMulaiValue);

        // Update the corresponding 'jam_selesai' input value
        jamSelesaiInputs[index].value = jamSelesaiValue;
    });
});

// Function to calculate 'jam_selesai' value
function calculateJamSelesai(jamMulai) {
    // Convert 'jamMulai' to a Date object
    const jamMulaiTime = new Date(`2000-01-01T${jamMulai}`);

    // Add 8 hours to 'jamMulaiTime'
    jamMulaiTime.setHours(jamMulaiTime.getHours() + 8);

    // Format the 'jam_selesai' time as "HH:MM"
    const jamSelesai = jamMulaiTime.toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' });

    return jamSelesai;
}

// CAPACITY IN DETAIL
document.addEventListener('DOMContentLoaded', function () {
    // Ambil elemen-elemen yang diperlukan
    var selectLayout = document.getElementById('select1');
    var capacityInput = document.getElementById('capacityPax');

    // Tambahkan event listener untuk perubahan pada dropdown layout
    selectLayout.addEventListener('change', function () {
        // Ambil nilai kapasitas dari atribut data-value
        var selectedOption = selectLayout.options[selectLayout.selectedIndex];
        var kapasitas = selectedOption.getAttribute('data-value');

        // Setel nilai input kapasitas sesuai dengan layout yang dipilih
        capacityInput.value = kapasitas;
    });
});


