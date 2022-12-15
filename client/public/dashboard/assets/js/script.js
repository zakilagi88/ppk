//function untuk ambil data dari Rest API
function tampil_data() {
    // var token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwidWlkIjoiNSIsImVtYWlsIjoiY29iYWxhZ2lAZ21haWwuY29tIn0.VOth1nYckn_ptZPHGQkZX7JzIQz4bXI8xqokIAm2YdY';
    $.ajax({
        method: 'GET',
        url: 'http://localhost:8012/jwt_app/jekz/public/mahasiswa',
        headers: { "Authorization": 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwidWlkIjoiNSIsImVtYWlsIjoiY29iYWxhZ2lAZ21haWwuY29tIn0.VOth1nYckn_ptZPHGQkZX7JzIQz4bXI8xqokIAm2YdY','Content-Type':'application/json'},
        dataType: 'json',
        error: function(err) {
            switch (err.status) {
              case "400":
                // bad request
                break;
              case "401":
                // unauthorized
                break;
              case "403":
                // forbidden
                break;
              default:
                //Something bad happened
                break;
            }
          },
        success: function(result) {
            console.log(result);
            var data='';    
  
            //perulangan untuk pasrng data JSON ke HTML
            $.each(result.data, function(i, item){
                data+='<tr>';
                  data+='<td>'+item.id+'</td>';
                  data+='<td>'+item.nama+'</td>';
                  data+='<td>'+item.nim+'</td>';
                  data+='<td>'+item.jurusan+'</td>';
                  data+='<td><button class="btn btn-info btn-edit" data="'+item.id+'" data-toggle="modal" data-target="#Modaledit">edit</button> <button class="btn btn-danger btn-hapus" data="'+item.id+'">hapus</button></td>';
                data+='</tr>';
            });
  
            //memasukan ke element HTML
            $('#tempat_data').html(data);
        }
    });
}
  
//inisialisasi fungsi
tampil_data();