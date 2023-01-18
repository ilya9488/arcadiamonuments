<?php
  $user_id = get_current_user_id();
?>
<section class="personal-area personal-data">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
        <div class="row">
          <div class="menu-wrap col-xl-3 col-lg-3 col-md-4 pl-0 ">
            <ul id="menu-personal-area" class="menu">
              <?php include get_template_directory() . '/acf-layouts/personal-area/tab_menu.php'; ?>
            </ul>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-8 px-xl-0 pl-lg-0">
            <form class="personal-data-form" action="<?= site_url(); ?>/wp-content/themes/arcadiamemorial/controllers/user/user_data.php" method="POST" enctype="multipart/form-data">
              <div class="form-header d-flex justify-content-between align-content-center">
                <h2>Personal Data</h2>
                <div class="edit d-flex align-content-center is-activated">
                  <svg  viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0)">
                        <path d="M18.6875 25.9978H2.97923C1.33578 25.9978 0 24.662 0 23.0186V7.31029C0 5.66684 1.33578 4.33105 2.97923 4.33105H12.1875C12.636 4.33105 13 4.69505 13 5.14355C13 5.59206 12.636 5.95605 12.1875 5.95605H2.97923C2.23279 5.95605 1.625 6.56384 1.625 7.31029V23.0186C1.625 23.765 2.23279 24.3728 2.97923 24.3728H18.6875C19.4339 24.3728 20.0417 23.765 20.0417 23.0186V13.8103C20.0417 13.3618 20.4057 12.9978 20.8542 12.9978C21.3027 12.9978 21.6667 13.3608 21.6667 13.8103V23.0186C21.6667 24.662 20.3309 25.9978 18.6875 25.9978Z"/>
                        <path d="M9.50348 17.3073C9.29004 17.3073 9.08196 17.2228 8.92921 17.069C8.7364 16.8772 8.65408 16.6009 8.70725 16.3355L9.47313 12.5049C9.50447 12.3468 9.58243 12.2026 9.6951 12.0899L20.9154 0.871006C22.0766 -0.290417 23.966 -0.290417 25.1284 0.871006C25.6906 1.43317 26.0004 2.18081 26.0004 2.97704C26.0004 3.77327 25.6906 4.52071 25.1272 5.08307L13.9084 16.3032C13.7957 16.4168 13.6505 16.4938 13.4934 16.5251L9.66376 17.291C9.6106 17.3019 9.55644 17.3073 9.50348 17.3073ZM13.3341 15.7289H13.345H13.3341ZM11.018 13.0651L10.5401 15.4591L12.9332 14.9803L23.9789 3.93474C24.2346 3.67786 24.3754 3.33886 24.3754 2.97704C24.3754 2.61522 24.2346 2.27602 23.9789 2.01934C23.4525 1.49169 22.5933 1.49169 22.0637 2.01934L11.018 13.0651Z"/>
                        <path d="M23.0204 6.85428C22.8125 6.85428 22.6044 6.77513 22.4463 6.61584L19.3826 3.55112C19.0652 3.23373 19.0652 2.71918 19.3826 2.40179C19.7 2.08441 20.2145 2.08441 20.5321 2.40179L23.5956 5.46652C23.913 5.78391 23.913 6.29846 23.5956 6.61584C23.4363 6.77414 23.2285 6.85428 23.0204 6.85428Z"/>
                      </g>
                    <defs>
                      <clipPath id="clip0">
                        <rect width="26" height="26" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                  <span class="edit-text">EDIT</span>
                </div>
              </div>
              <div class="img-wrap">
                <div class="img">
                  <img id="user_photo_preview" src="<?= !empty($user_data->user_photo) ? $user_data->user_photo : get_template_directory_uri() . '/static/img/icons/user-gray.svg' ?>" alt="#">
                </div>
                <label for="user_photo" class="is-activated">
                  <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="bg" d="M20 40C31.0457 40 40 31.0457 40 20C40 8.9543 31.0457 0 20 0C8.9543 0 0 8.9543 0 20C0 31.0457 8.9543 40 20 40Z"/>
                    <path class="pencil" d="M29.3775 12.4288L27.5651 10.6198C26.737 9.79337 25.3898 9.79341 24.5617 10.6198C23.782 11.398 11.8736 23.2842 11.0778 24.0785C10.993 24.1631 10.9362 24.2755 10.916 24.3855L10.0098 29.2697C9.97468 29.4591 10.0352 29.6536 10.1716 29.7897C10.3082 29.9261 10.5031 29.9863 10.6926 29.9513L15.5859 29.0467C15.699 29.0257 15.8102 28.9685 15.8936 28.8852L29.3775 15.4266C30.2075 14.5982 30.2076 13.2573 29.3775 12.4288ZM11.3172 28.6462L11.8654 25.6917L14.2773 28.0991L11.3172 28.6462ZM15.4793 27.6446L12.3207 24.492L23.8523 12.982L27.0109 16.1346L15.4793 27.6446ZM28.5488 14.5996L27.8395 15.3076L24.6809 12.155L25.3903 11.4469C25.7614 11.0765 26.3653 11.0764 26.7365 11.4469L28.5488 13.2559C28.9209 13.6272 28.9209 14.2282 28.5488 14.5996Z"/>
                  </svg>
                </label>
                <input type="file" id="user_photo" name="user_photo" class="user_photo" >
              </div>
              <div class="form-fields is-activated">
                <label for="first_name" class="is-activated">
                  First Name
                  <input type="text" id="first_name" name="first_name" value=""
                         placeholder="<?= !empty($user_data->first_name) ? $user_data->first_name : '...' ?>"
                         data-value="<?= !empty($user_data->first_name) ? $user_data->first_name : '' ?>" readonly>
                </label>
                <label for="last_name" class="is-activated">
                  Last Name
                  <input type="text" id="last_name" name="last_name" value=""
                         placeholder="<?= !empty($user_data->last_name) ? $user_data->last_name : '...' ?>"
                         data-value="<?= !empty($user_data->last_name) ? $user_data->last_name : '...' ?>" readonly>
                </label>
                <label for="date_of_birth" class="is-activated">
                  Date of Birth
                  <input type="text" id="date_of_birth" name="birthday" value=""
                         placeholder="<?= !empty($user_data->birthday) ? $user_data->birthday : '' ?>"
                         data-value="<?= !empty($user_data->birthday) ? $user_data->birthday : '' ?>"
                         autocomplete="off" disabled readonly>
                  <svg id="bracket_birth" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.84375 1.59323L6.50075 7.25023L12.1577 1.59323L11.4508 0.88623L6.50075 5.83623L1.55075 0.88623L0.84375 1.59323Z"/>
                  </svg>
                </label>
                <label for="email" class="is-activated">
                  Email
                  <input type="email" id="email" name="email" value=""
                         placeholder="<?= !empty($user_data->user_email) ? $user_data->user_email : '...' ?>"
                         data-value="<?= !empty($user_data->user_email) ? $user_data->user_email : '' ?>"
                         readonly>
                </label>
                <?php if(false){ // We can't get user pass from DB ?>
                <label for="password">
                  Password
                  <input type="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;" id="password" readonly>
                  <svg class="eye" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.3548 7.64305C12.1923 7.48055 11.9281 7.48055 11.7656 7.64305C11.6031 7.80555 11.6031 8.07055 11.7656 8.23223C12.2373 8.70391 12.4981 9.33141 12.4981 9.99974C12.4981 11.3781 11.3764 12.4997 9.99809 12.4997C9.32977 12.4997 8.70227 12.2397 8.23059 11.7672C8.06809 11.6047 7.80391 11.6047 7.64141 11.7672C7.47891 11.9289 7.47891 12.1939 7.64141 12.3564C8.26973 12.9864 9.10723 13.3331 9.99809 13.3331C11.8364 13.3331 13.3314 11.8381 13.3314 9.99977C13.3314 9.10888 12.9848 8.27138 12.3548 7.64305Z"/>
                    <path d="M10.5821 6.72388C10.3929 6.69056 10.1996 6.66638 10.0013 6.66638C8.16297 6.66638 6.66797 8.16138 6.66797 9.9997C6.66797 10.198 6.69215 10.3914 6.72629 10.5805C6.76211 10.7822 6.93797 10.9247 7.13547 10.9247C7.15965 10.9247 7.18379 10.923 7.20879 10.918C7.43461 10.878 7.58629 10.6613 7.54629 10.4355C7.52047 10.2938 7.50129 10.1497 7.50129 9.9997C7.50129 8.62138 8.62297 7.4997 10.0013 7.4997C10.1513 7.4997 10.2955 7.51888 10.4371 7.54388C10.6588 7.58888 10.8796 7.4322 10.9196 7.20638C10.9596 6.98056 10.808 6.76388 10.5821 6.72388Z"/>
                    <path d="M19.8994 9.73053C19.8053 9.61885 17.5511 6.98803 14.442 5.37721C14.2403 5.27139 13.9861 5.35139 13.8803 5.55639C13.7745 5.76057 13.8545 6.01221 14.0595 6.11807C16.4545 7.35807 18.3678 9.29307 19.0219 9.99974C18.0286 11.0756 14.1195 14.9997 9.99865 14.9997C8.60033 14.9997 7.19115 14.6622 5.80865 13.9956C5.60366 13.8947 5.35284 13.9822 5.25284 14.1897C5.15202 14.3964 5.23952 14.6456 5.44702 14.7456C6.94283 15.4681 8.47451 15.8331 9.99869 15.8331C15.1329 15.8331 19.7078 10.4964 19.9003 10.2689C20.0319 10.1138 20.0311 9.88635 19.8994 9.73053Z"/>
                    <path d="M12.7342 4.64638C11.7859 4.3272 10.8659 4.16638 10 4.16638C4.86587 4.16638 0.290876 9.50305 0.0983768 9.73055C-0.0233027 9.87387 -0.0333027 10.0822 0.0750565 10.238C0.132556 10.3205 1.51005 12.2764 3.89755 13.8622C3.96837 13.9097 4.04755 13.9322 4.12755 13.9322C4.26173 13.9322 4.39423 13.8672 4.47423 13.7447C4.60173 13.5539 4.54923 13.2947 4.35755 13.168C2.60423 12.0022 1.40423 10.5947 0.955055 10.0222C1.91423 8.98055 5.84923 4.99974 10 4.99974C10.7759 4.99974 11.6067 5.14642 12.4684 5.43556C12.6867 5.51388 12.9234 5.39306 12.9959 5.17388C13.0692 4.95556 12.9525 4.71974 12.7342 4.64638Z"/>
                    <path id="dash" d="M17.3777 2.62218C17.2152 2.45968 16.951 2.45968 16.7885 2.62218L2.62187 16.7888C2.45938 16.9513 2.45938 17.2155 2.62187 17.378C2.70355 17.4588 2.81019 17.4997 2.91687 17.4997C3.02355 17.4997 3.13019 17.4589 3.21105 17.378L17.3777 3.21136C17.5402 3.04886 17.5402 2.78468 17.3777 2.62218Z"/>
                  </svg>
                </label>
                <?php } ?>
                <div class="footer-form disabled">
                  <input type="hidden" name="user_id" value="<?= $user_id ?>">

                  <input type="submit" value="save" disabled>
                  <input type="reset" value="cancel">
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.col-xl-9 -->
    </div>
    <!-- /.row -->
  </div>
</section>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $('#user_photo_preview').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#user_photo").change(function(){
        readURL(this);
    });
</script>