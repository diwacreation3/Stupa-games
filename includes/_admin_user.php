<?php

function admin_user_card($username, $email,$created_date)
{
    echo <<<EOT
        <div class="container d-flex justify-content-center">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Welcome</h5>
            <p class="card-text">$username</p>
            <p class="card-text">Email: $email</p>
            <p class="card-text">Account Created: $created_date </p>
            <div class="d-grid gap-2">
              <a href="#" class="btn btn-primary mb-2">Change Password</a>
              <button type="button" class="btn btn-danger">Delete Account</button>
            </div>
          </div>
          </div>
          </div>
    EOT;
}
