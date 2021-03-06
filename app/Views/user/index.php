<?= $this->extend('templates/index'); ?>
<?= $this->section('pageContent'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Welcome <?= user()->username; ?>!</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">My Profile</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
      <p>
        Username : <?= user()->username; ?> <br>
        Email    : <?= user()->email; ?> <br>
        Created At : <?= user()->created_at; ?>
      </p>
      </div>
    </div>
    <!-- /.card -->

  </section>

  <?= $this->endSection(); ?>