<main class="no-padding overflow-hidden h-100vh p-8 flex flex-col gap-4 items-center">
  <?= view("components/app/logo") ?>
  <section class="flex-grow w-full relative flex flex-col gap-4">
    <article class="w-full h-full absolute inset-0 flex flex-col gap-4 transition-opacity" id="register-form-0">
      <?php for ($i = 1; $i <= 4; $i++): ?>
        <div class="flex flex-col gap-1">
          <h3 class="text-text font-main font-semibold text-xl">
            <?= lang("Auth.title_" . $i) ?>
          </h3>
          <p class="text-sm font-main">
            <?= lang("Auth.text_" . $i) ?>
          </p>
        </div>
      <?php endfor; ?>
      <p class="text-sm font-main text-center">
        Ready to make a real difference? Sign up now, and let's be Squireal for the Climate together!
      </p>
    </article>
    <form class="w-full h-full absolute inset-0" id="register-form"
      method="post" action="<?= base_url() . "api/auth/register" ?>">
      <article class="w-full h-full absolute inset-0 transition-opacity invisible opacity-0 flex flex-col gap-4"
        id="register-form-1">
        <p class="font-main text-text text-sm text-center">
          <?= lang("Auth.welcome") ?>
        </p>  
        <div class="flex flex-col gap-2">
          <h4 class="text-text font-main font-semibold text-lg">
            <?= lang("Auth.about.title") ?>
          </h4>
          <?= view("components/app/input", [
            "id" => uniqid(),
            "type" => "text",
            "placeholder" => "Auth.about.username",
            "legend" => "Auth.about.username.legend",
            "regex" => "/^[a-z0-9]+$/",
            "value" =>  $_GET['username'] ?? null,
            "form" => "register-form",
            "name" => "username"
          ]) ?>
          <?= view("components/app/input", [
            "id" => uniqid(),
            "type" => "text",
            "placeholder" => "Auth.about.completename",
            "legend" => null,
            "regex" => "/^[a-zA-Z]+ [a-zA-Z]+$/",
            "value" =>  $_GET['completename'] ?? null,
            "form" => "register-form",
            "name" => "completename"
          ]) ?>
        </div>
        <div class="flex flex-col gap-2">
          <h4 class="text-text font-main font-semibold text-lg">
            <?= lang("Auth.contact.title") ?>
          </h4>
          <?= view("components/app/input", [
            "id" => uniqid(),
            "type" => "tel",
            "placeholder" => "Auth.contact.phone",
            "legend" => "Auth.contact.phone.legend",
            "regex" => "/^(\d{10})$/",
            "value" =>  $_GET['phone'] ?? null,
            "form" => "register-form",
            "name" => "phone"
          ]) ?>
          <?= view("components/app/input", [
            "id" => uniqid(),
            "type" => "email",
            "placeholder" => "Auth.contact.email",
            "legend" => "Auth.contact.email.legend",
            "regex" => "/^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})$/",
            "value" =>  $_GET['email'] ?? null,
            "form" => "register-form",
            "name" => "email"
          ]) ?>
        </div>
        <p class="font-main text-center text-sm text-text">
          <?= lang("Auth.accept.1") ?>
          <a href="<?= base_url() . service("request")->getLocale() . "/legals/privacy-policy" ?>"
            class="text-mainorange font-bold underline">
            <?= lang("Auth.accept.2") ?>
          </a>
          <?= lang("Auth.accept.3") ?>
          <a href="<?= base_url() . service("request")->getLocale() . "/legals/terms-of-use" ?>"
            class="text-mainorange font-bold underline">
            <?= lang("Auth.accept.4") ?>
          </a>
        </p>
      </article>
      <article class="w-full h-full absolute inset-0 transition-opacity invisible opacity-0 flex flex-col gap-4"
        id="register-form-2">
        <?php
        $id = uniqid();
        $password_id = $id;
        ?>
        <p class="font-main text-text text-sm text-center">
          <?= lang("Auth.passwords.text") ?>
        </p>
        <div class="w-full h-14 border-2 border-text rounded-xl bg-foreground flex overflow-hidden"
          id="container-<?= $id ?>">
          <div class="flex-grow pl-4">
            <input type="password" class="h-full w-full outline-none" id="input-<?= $id ?>" data-valid="false"
              placeholder="<?= lang("Auth.passwords.password") ?>" required
              value="<?= $_GET['password'] ?? null ?>"
              form="register-form" name="password"
              />
          </div>
          <div class="h-14 w-14 flex items-center justify-center border-s-2 border-text pb-1 bg-blue-300"
            id="validation-<?= $id ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-eye">
              <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
              <circle cx="12" cy="12" r="3" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-eye-off hidden">
              <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24" />
              <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68" />
              <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61" />
              <line x1="2" x2="22" y1="2" y2="22" />
            </svg>
          </div>

        </div>
        <ul>
          <li class="text-text text-xs flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-x">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-check hidden">
              <path d="M20 6 9 17l-5-5" />
            </svg>
            <span>
              <?= lang("Auth.passwords.criteria.1") ?>
            </span>
          </li>
          <li class="text-text text-xs flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-x">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-check hidden">
              <path d="M20 6 9 17l-5-5" />
            </svg><span>
              <?= lang("Auth.passwords.criteria.2") ?>
            </span>
          </li>
          <li class="text-text text-xs flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-x">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-check hidden">
              <path d="M20 6 9 17l-5-5" />
            </svg><span>
              <?= lang("Auth.passwords.criteria.3") ?>
            </span>
          </li>
          <li class="text-text text-xs flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-x">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-check hidden">
              <path d="M20 6 9 17l-5-5" />
            </svg><span>
              <?= lang("Auth.passwords.criteria.4") ?>
            </span>
          </li>
        </ul>
        <script defer>
          const validation_<?= $id ?> = document.getElementById('validation-<?= $id ?>');
          const input_<?= $id ?> = document.getElementById('input-<?= $id ?>');

          validation_<?= $id ?>.addEventListener('click', () => {
            if (input_<?= $id ?>.getAttribute("type") === "password") {
              input_<?= $id ?>.setAttribute("type", "text");
              document.querySelector("#container-<?= $id ?> .lucide-eye").classList.toggle("hidden", true);
              document.querySelector("#container-<?= $id ?> .lucide-eye-off").classList.toggle("hidden", false);
            } else {
              input_<?= $id ?>.setAttribute("type", "password");
              document.querySelector("#container-<?= $id ?> .lucide-eye").classList.toggle("hidden", false);
              document.querySelector("#container-<?= $id ?> .lucide-eye-off").classList.toggle("hidden", true);
            }
          });

          input_<?= $id ?>.addEventListener('input', () => {
            const criteria = document.querySelectorAll("#register-form ul li");
            const regexs = [/^.{8,}$/, /[A-Z]/, /[a-z]/, /[0-9]/];
            criteria.forEach((li, i) => {
              const value = input_<?= $id ?>.value;
              if (value.match(regexs[i])) {
                li.querySelector(".lucide-x").classList.toggle("hidden", true);
                li.querySelector(".lucide-check").classList.toggle("hidden", false);
              } else {
                li.querySelector(".lucide-x").classList.toggle("hidden", false);
                li.querySelector(".lucide-check").classList.toggle("hidden", true);
              }
            });
            // if all criteria are met then the input is "data-valid"
            if (input_<?= $id ?>.value.match(regexs[0]) && input_<?= $id ?>.value.match(regexs[1]) && input_<?= $id ?>.value.match(regexs[2]) && input_<?= $id ?>.value.match(regexs[3])) {
              input_<?= $id ?>.setAttribute("data-valid", "true");
            } else {
              input_<?= $id ?>.setAttribute("data-valid", "false");
            }
          });
        </script>
        <?php
        $id = uniqid();
        $confirm_id = $id;
        ?>
        <div class="w-full h-14 border-2 border-text rounded-xl bg-foreground flex overflow-hidden"
          id="container-<?= $id ?>">
          <div class="flex-grow pl-4">
            <input type="password" class="h-full w-full outline-none" id="input-<?= $id ?>" data-valid="false"
              placeholder="<?= lang("Auth.passwords.confirm") ?>" required 
              value="<?= $_GET['confirm'] ?? null ?>"
              form="register-form" name="confirm"
              />
          </div>
          <div class="h-14 w-14 flex items-center justify-center border-s-2 border-text pb-1 bg-red-300"
            id="validation-<?= $id ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-x">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-check hidden">
              <path d="M20 6 9 17l-5-5" />
            </svg>
          </div>
        </div>
        <script defer>
          let fields = document.querySelectorAll("#register-form input#input-<?= $password_id ?>, #register-form input#input-<?= $confirm_id ?>");
          fields.forEach((field) => {
            "input focus change".split(" ").forEach((e) => {
              field.addEventListener(e, () => {
              if (document.querySelector("#register-form input#input-<?= $password_id ?>").value === document.querySelector("#register-form input#input-<?= $confirm_id ?>").value) {
                document.querySelector("#register-form input#input-<?= $confirm_id ?>").setAttribute("data-valid", "true");
                document.querySelector("#register-form #container-<?= $confirm_id ?> .lucide-x").classList.toggle("hidden", true);
                document.querySelector("#register-form #container-<?= $confirm_id ?> .lucide-check").classList.toggle("hidden", false);
                document.querySelector("#register-form #validation-<?= $confirm_id ?>").classList.toggle("bg-red-300", false);
                document.querySelector("#register-form #validation-<?= $confirm_id ?>").classList.toggle("bg-green-300", true);

              } else {
                document.querySelector("#register-form input#input-<?= $confirm_id ?>").setAttribute("data-valid", "false");
                document.querySelector("#register-form #container-<?= $confirm_id ?> .lucide-x").classList.toggle("hidden", false);
                document.querySelector("#register-form #container-<?= $confirm_id ?> .lucide-check").classList.toggle("hidden", true);
                document.querySelector("#register-form #validation-<?= $confirm_id ?>").classList.toggle("bg-red-300", true);
                document.querySelector("#register-form #validation-<?= $confirm_id ?>").classList.toggle("bg-green-300", false);
              }
            });
            })
          });
        </script>
      </article>
    </form>
    <nav class="fixed inset-x-8 bottom-8 flex gap-4">
      <button
        class="aspect-square flex rounded-xl text-lg items-center justify-center p-3 border-4 border-maindarkgreen text-maindarkgreen font-bold"
        id="register-back">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M6.71669 3.14482C8.02635 3.45076 9.29349 3.74687 10.5579 4.04253C10.6036 5.68833 9.41658 8.97145 6.51661 10.2693L23.9826 10.2693C23.9876 10.3761 23.9934 10.4484 23.9934 10.5212C23.9938 11.5038 23.9867 12.4864 23.9992 13.4689C24.0019 13.6994 23.9298 13.7548 23.7069 13.7548C18.1115 13.749 12.5162 13.7503 6.92124 13.7503C6.80531 13.7503 6.68894 13.7503 6.57301 13.7503C6.57122 13.7682 6.56898 13.786 6.56719 13.8039C6.82814 13.949 7.09222 14.0897 7.35003 14.2407C7.95921 14.5971 8.44351 15.0866 8.89289 15.627C9.63411 16.5194 10.1121 17.535 10.3896 18.6489C10.4841 19.0285 10.5177 19.4228 10.5826 19.8096C10.6023 19.9275 10.562 19.9887 10.4425 20.0155C9.35257 20.2589 8.26313 20.505 7.17368 20.7507C7.0309 20.7828 6.88812 20.8154 6.71266 20.8552C6.68402 20.6202 6.64865 20.4166 6.63612 20.2111C6.55869 18.9579 6.20822 17.7842 5.52117 16.7346C4.82695 15.6744 3.86507 14.9106 2.69998 14.4006C1.90953 14.0545 1.08058 13.8687 0.227917 13.7686C0.162121 13.761 0.0967731 13.7507 0.0175495 13.7396C0.0126266 13.6556 0.0045681 13.5824 0.0045681 13.5096C0.00367355 12.5047 0.00770187 11.4998 9.34601e-05 10.4949C-0.00124931 10.339 0.0403767 10.2613 0.197481 10.2403C0.425755 10.2095 0.652239 10.163 0.88051 10.1318C1.6459 10.0264 2.36966 9.78341 3.0585 9.44576C4.33415 8.82138 5.28439 7.86249 5.9146 6.59185C6.22971 5.95631 6.43694 5.28459 6.539 4.58339C6.60748 4.11488 6.65626 3.64325 6.71758 3.14482H6.71669Z"
            fill="currentColor" />
        </svg>
      </button>
      <button
        class="w-full flex rounded-xl text-lg items-center justify-between p-4 bg-maindarkgreen text-foreground font-medium"
        id="register-next"
          type="submit"
          form="register-form"
        >
        <span>
          <?= lang("Auth.next") ?>
        </span>
        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_347_431)">
            <path
              d="M17.338 20.8552C16.0284 20.5492 14.7612 20.2531 13.4968 19.9575C13.4511 18.3117 14.6381 15.0285 17.5381 13.7307H0.0720834C0.0671598 13.6239 0.0613411 13.5516 0.0613411 13.4788C0.0608935 12.4962 0.068055 11.5136 0.0555224 10.5311C0.0528368 10.3006 0.124899 10.2452 0.347801 10.2452C5.94318 10.251 11.5386 10.2497 17.1335 10.2497C17.2494 10.2497 17.3658 10.2497 17.4817 10.2497C17.4835 10.2318 17.4857 10.214 17.4875 10.1961C17.2266 10.0509 16.9625 9.91025 16.7047 9.75929C16.0955 9.40289 15.6112 8.91339 15.1618 8.37298C14.4206 7.48063 13.9426 6.46501 13.6651 5.35113C13.5706 4.9715 13.5371 4.57714 13.4722 4.19036C13.4525 4.07245 13.4927 4.01127 13.6123 3.98447C14.7021 3.74106 15.7916 3.49497 16.881 3.24933C17.0238 3.21717 17.1666 3.18457 17.3421 3.14482C17.3707 3.37974 17.4061 3.5834 17.4186 3.78885C17.496 5.04207 17.8465 6.21579 18.5336 7.26535C19.2278 8.32563 20.1896 9.08936 21.3547 9.5994C22.1452 9.94553 22.9741 10.1313 23.8268 10.2314C23.8926 10.239 23.9579 10.2492 24.0372 10.2604C24.0421 10.3444 24.0501 10.4176 24.0501 10.4904C24.051 11.4953 24.047 12.5002 24.0546 13.5051C24.056 13.661 24.0143 13.7387 23.8572 13.7597C23.629 13.7905 23.4025 13.8369 23.1742 13.8682C22.4088 13.9736 21.6851 14.2166 20.9962 14.5542C19.7206 15.1786 18.7703 16.1375 18.1401 17.4081C17.825 18.0437 17.6178 18.7154 17.5157 19.4166C17.4472 19.8851 17.3985 20.3567 17.3371 20.8552H17.338Z"
              fill="currentColor" />
          </g>
          <defs>
            <clipPath id="clip0_347_431">
              <rect width="24" height="24" fill="currentColor" transform="translate(0.0554504)" />
            </clipPath>
          </defs>
        </svg>
      </button>
    </nav>
    <script defer>
      const steps = document.querySelectorAll('[id^="register-form-"]');
      const back = document.getElementById('register-back');
      const next = document.getElementById('register-next');
      let currentStep = 0;

      const toggleStep = (step) => {
        steps.forEach((s, i) => {
          if (i === step) {
            s.classList.remove('invisible', 'opacity-0');
            s.classList.add('opacity-100');
          } else {
            s.classList.remove('opacity-100');
            s.classList.add('invisible', 'opacity-0');
          }
        });
      };

      next.addEventListener('click', (e) => {
        e.preventDefault();
        if (currentStep == 0 ) {
          currentStep++;
          toggleStep(currentStep);
        } else if (currentStep == 1) {
          let section =document.getElementById('register-form-1');
          let inputs = section.getElementsByTagName('input');
          let valid = true;

          for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].getAttribute("data-valid") === "false") {
              valid = false;
            }
          }

          if (valid) {
            currentStep++;
            toggleStep(currentStep);
          } else {
            alert("Please fill the form correctly");
          }

        } else {
          let section =document.getElementById('register-form-2');
          let inputs = section.getElementsByTagName('input');
          let valid = true;

          for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].getAttribute("data-valid") === "false") {
              valid = false;
            }
          }

          if (valid) {
            e.target.form.submit();
          } else {
            alert("Please fill the form correctly");
          }
        }
      });

      back.addEventListener('click', () => {
        if (currentStep > 0) {
          currentStep--;
          toggleStep(currentStep);
        } else {
          window.history.back();
        }
      });
    </script>
  </section>
</main>