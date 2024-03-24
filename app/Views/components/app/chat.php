<div class="w-fit max-w-64 p-4 rounded-lg pt-2 <?=
  $isMine ? 'bg-maindarkgreen self-end' : 'bg-mainorange self-start'
  ?>">
  <p class="text-white text-lg font-bold font-main">
    <?= $username ?> :
  </p>
  <p class="pt-2 font-main text-md text-white">
    <?= $message ?>
  </p>
</div>