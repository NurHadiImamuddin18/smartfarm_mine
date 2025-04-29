    <!-- Login 5 - Bootstrap Brain Component -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-5/assets/css/login-5.css">
<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-4 text-bg-success">
          <div class="d-flex align-items-center justify-content-center h-100">
            <div class="col-10 col-xl-8 py-3">
              <img class="img-fluid rounded mb-4" loading="lazy" src="assets/images/1234.png" width="245" height="80" alt="BootstrapBrain Logo">
              <hr class="border-success-subtle mb-4">
              <h2 class="h3 mb-4">Sistem Monitoring Penyiraman Tanaman Otomatis Berbasis Website</h2>
              <p class="lead m-0">Sistem ini dibuat untuk memudahkan pemilik tanaman dalam mengukur kelembaban tanah, melakukan penyiraman secara otomatis dan meningkatkan efisiensi waktu dan tenaga.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-8">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h3>Login</h3>
                </div>
              </div>
            </div>
            <form action="aksi_login.php" method="post">
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="email" class="form-label">NIM <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="nim" id="nim" placeholder="Enter NIM" required>
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="password" placeholder="Enter Password" value="" required>
                </div>
                <div class="form-group">
                        <label for="exampleSelectGender">Status <code>*</code>  </label>
                        <select class="form-control" name="status" id="exampleSelectGender" required>
                          <option value="">--- PILIH ---</option>
                          <option value="ketua">Ketua</option>
                          <option value="anggota">Anggota</option>
                        </select>
                      </div>
                
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-success" type="submit">Login</button>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                  <a href="#!" class="text-danger text-decoration-none">Jika lupa sandi harap menghubungi admin</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <p class="mt-5 mb-4">Untuk Registrasi Menghubungi Admin</p>
            

                <span class="ms-2 fs-6">Email = <a href="https://mail.google.com/mail/u/0/#inbox?compose=new" class="link-primary"> @yundanusuy@gmail.com</a> </span><br>
                <span class="ms-2 fs-6">WA = <span class="text-primary"> 081216519335</span></span><br>
                <span class="ms-2 fs-6">IG = <a href="https://www.instagram.com/yourayunda/" class="link-primary"> @yourayunda</a> </span>
                  
                 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>