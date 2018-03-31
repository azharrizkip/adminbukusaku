function kel(){
      var ke = document.getElementById('kelas').value;
      var sp = " ";
    var la = document.getElementById('jurusan').value;
    var s = document.getElementById('angka').value;
    var res = ke+sp+la+s;
    document.getElementById('kelaspilih').value = res;
    document.getElementById('jurusanpilih').value = la;
  }
  function validasi_input(form){
    if (form.kelaspilih.value == ""){
      alert("Pilih Kelas Dahulu!!");
      return (false);
    }
  return (true);
  }
