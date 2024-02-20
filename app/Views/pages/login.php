<main
  class="no-padding overflow-hidden h-100vh p-8 flex flex-col gap-8 items-center"
>
  <?= view('components/app/logo') ?>
  <div
    class="flex flex-col gap-2"
  >
    <h3
      class="text-text font-main font-semibold text-2xl"
    >
      <?= lang('Auth.loginTitle') ?>
    </h3>
    <p>
      <?= lang('Auth.loginText') ?>
    </p>
  </div>
  <form
    class="w-full flex flex-col gap-4 items-center"
    id="login-form"
  >
    <?= view('components/app/input', [
      "id" => uniqid(),
      "type" => "text",
      "placeholder" => "Auth.email",
      "legend" => "Auth.emailLegend",
      "regex" => "/^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})$/"
    ] ) ?>
    <?= view('components/app/input', [
      "id" => uniqid(),
      "type" => "password",
      "placeholder" => "Auth.password",
      "legend" => null,
      "regex" => null,
    ] ) ?>
  </form>
  <div
    class="fixed inset-x-8 bottom-8 flex gap-4"
  >
    <?= view('components/app/link', [
      'href' => base_url() . service('request')->getLocale() . '/app/auth',
      'content' => "",
      'size' => 'icon',
      'color' => "outline",
      'icon' => "arrow_back",
      "class" => ""
    ]) ?>
   <button 
  class="w-full flex rounded-xl text-lg items-center justify-between p-4 bg-maindarkgreen text-foreground font-medium"
    form="login-form"
    type="submit"
  > <?= isset($class) ? $class : '' ?>
  <span>
    <?= lang('Auth.signIn') ?>
    </span>
    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_347_431)"><path d="M17.338 20.8552C16.0284 20.5492 14.7612 20.2531 13.4968 19.9575C13.4511 18.3117 14.6381 15.0285 17.5381 13.7307H0.0720834C0.0671598 13.6239 0.0613411 13.5516 0.0613411 13.4788C0.0608935 12.4962 0.068055 11.5136 0.0555224 10.5311C0.0528368 10.3006 0.124899 10.2452 0.347801 10.2452C5.94318 10.251 11.5386 10.2497 17.1335 10.2497C17.2494 10.2497 17.3658 10.2497 17.4817 10.2497C17.4835 10.2318 17.4857 10.214 17.4875 10.1961C17.2266 10.0509 16.9625 9.91025 16.7047 9.75929C16.0955 9.40289 15.6112 8.91339 15.1618 8.37298C14.4206 7.48063 13.9426 6.46501 13.6651 5.35113C13.5706 4.9715 13.5371 4.57714 13.4722 4.19036C13.4525 4.07245 13.4927 4.01127 13.6123 3.98447C14.7021 3.74106 15.7916 3.49497 16.881 3.24933C17.0238 3.21717 17.1666 3.18457 17.3421 3.14482C17.3707 3.37974 17.4061 3.5834 17.4186 3.78885C17.496 5.04207 17.8465 6.21579 18.5336 7.26535C19.2278 8.32563 20.1896 9.08936 21.3547 9.5994C22.1452 9.94553 22.9741 10.1313 23.8268 10.2314C23.8926 10.239 23.9579 10.2492 24.0372 10.2604C24.0421 10.3444 24.0501 10.4176 24.0501 10.4904C24.051 11.4953 24.047 12.5002 24.0546 13.5051C24.056 13.661 24.0143 13.7387 23.8572 13.7597C23.629 13.7905 23.4025 13.8369 23.1742 13.8682C22.4088 13.9736 21.6851 14.2166 20.9962 14.5542C19.7206 15.1786 18.7703 16.1375 18.1401 17.4081C17.825 18.0437 17.6178 18.7154 17.5157 19.4166C17.4472 19.8851 17.3985 20.3567 17.3371 20.8552H17.338Z" fill="currentColor"/></g><defs><clipPath id="clip0_347_431"><rect width="24" height="24" fill="currentColor" transform="translate(0.0554504)"/></clipPath></defs></svg>
</button>
<script
  defer
>
  <?php $id = uniqid(); ?>
  const form_<?= $id ?> = document.getElementById('login-form');
  form_<?= $id ?>.addEventListener('submit', (e) => {
    e.preventDefault();
    const inputs = form_<?= $id ?>.querySelectorAll('input');
    var isValid = true;
    inputs.forEach(input => {
      // if data-valid is false then input not valid and shake it
      if (input.dataset.valid === 'false') {
        input.classList.add('animate-bounce');
        isValid = false;
        setTimeout(() => {
          // input.classList.remove('animate-bounce');
        }, 1000);
      }
    });
    if (isValid) {
      form_<?= $id ?>.submit();
    }
  });

</script>
  </div>
</main>