
    //FUNGSI COUNTDOWN
    function siangTimeCountdown(data){
        date = data.tanggal
        time = data.time
        dateFormatted = date.toLocaleString('default',{day: 'numeric', month: 'long', year: 'numeric'});
        // Mengatur waktu akhir perhitungan mundur
        var countDownDate = new Date(date+' '+time).getTime();
        
        // Memperbarui hitungan mundur setiap 1 detik
        var x = setInterval(function() {
        
        // Untuk mendapatkan tanggal dan waktu hari ini
        var now = new Date().getTime();
            
        // Temukan jarak antara sekarang dan tanggal hitung mundur
        var distance = countDownDate - now;
            
        // Perhitungan waktu untuk hari, jam, menit dan detik
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // Keluarkan hasil dalam elemen dengan id = "demo"
        // document.getElementById("demo").innerHTML = days + "&nbsp;:&nbsp;" + hours + "&nbsp;:&nbsp;"
        // + minutes + "&nbsp;:&nbsp;" + seconds;
        document.getElementById("demo").innerHTML ="count down = &nbsp;:&nbsp;" + hours + "&nbsp;:&nbsp;"
        + minutes + "&nbsp;:&nbsp;" + seconds;
        
        // Jika hitungan mundur selesai, tulis beberapa teks 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "Result "+data.waktu;
        }
        }, 1000);
    }


    function siangTime(data){
        document.getElementById("undian").innerHTML ="waktu undian = &nbsp;&nbsp;" + data.tanggal + "&nbsp;,&nbsp;"
        + data.time;
    }

    async function getApiSiang(){
        let url = window.location.href+'api/setting/siang';
        let response = await fetch(url);
        let data = await response.json()
        if (data.status == "success") {
            
            //countdown data
            siangTimeCountdown(data)
            //waktu undian
            siangTime(data)
            
        }
    }

    getApiSiang()