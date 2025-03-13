<?php
session_start();
// Optionally check if user is authenticated:
if (empty($_SESSION['authenticated'])) {
    header('Location: api/index.php');
    exit();
}

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';
?>

<!-- Instruction Section -->
<section class="section">
  <div class="container">
    <div class="instruction-card card">
      <div class="card-content">
        <ul>
            <li>1) Please use this tool only on a desktop computer and not on a mobile phone or tablet.</li>
            <li>2) Fill out the fields below. The preview will update as you type. Please make sure your mobile number is formatted correctly: 210.123.4567</li>
            <li>3) Click the "Copy Signature" button.</li>
            <li>4) Open the Outlook program or the <a href="https://outlook.com">Outlook website</a> and ensure you are signed i to your St. Anthony email account.</li>
            <li>5) Select <strong>File > Options</strong>.</li>
            <li>6) Select <strong>Mail > Signatures</strong>.</li>
            <li>7) Select <strong>New</strong>, type a name, and select <strong>OK</strong>.</li>
            <li>8) In the <strong>Edit signature</strong> box, right click, and select the first icon under <strong>Paste Options:</strong> (Keep Source Formatting).</li>
            <li>9) To set your new signature as a <em>default</em> that will be auto-inserted in every message, under <strong>Choose default signature</strong>, select the drop down box next to <strong>New Messages</strong> or <strong>Replies/forwards</strong>, then select your new signature.</li>
            <li>10) You now have an email signature that is compliant with <a href="public/pdfs/LUX_EmailSignatures.pdf"><u>The Luxury Collection Email Signature Guidelines</u></a>.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Main Content Section -->
<section class="section">
  <div class="container">
    <div class="columns">
      <!-- LEFT COLUMN: Form -->
      <div class="column is-one-third">
        <h3 class="title is-4 acta-headline">Your Information</h3>
        <!-- START FORM -->
        <form id="form">
          <!-- First Name -->
          <div class="field">
            <label class="label" for="first_name">First Name</label>
            <div class="control has-icons-left">
              <input id="first_name" class="input" placeholder="First Name" required>
              <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
            </div>
          </div>
          <!-- Last Name -->
          <div class="field">
            <label class="label" for="last_name">Last Name</label>
            <div class="control has-icons-left">
              <input id="last_name" class="input" placeholder="Last Name" required>
              <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
            </div>
          </div>
          <!-- Title -->
          <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control has-icons-left">
              <input id="title" class="input" placeholder="Your Title" required>
              <span class="icon is-small is-left"><i class="fas fa-briefcase"></i></span>
            </div>
          </div>
          <!-- Cell Phone -->
          <div class="field">
            <label class="label" for="cell">Cell Phone</label>
            <div class="control has-icons-left">
              <input
                id="cell"
                class="input"
                placeholder="123.456.7890"
                required
                pattern="(\d{3}[-.]\d{3}[-.]\d{4}|\(\d{3}\)\s*\d{3}[-.]\d{4})"
                title="Format: 123.456.7890"
              >
              <span class="icon is-small is-left"><i class="fas fa-mobile-alt"></i></span>
            </div>
          </div>
        </form>
        <!-- END FORM -->
      </div>

      <!-- RIGHT COLUMN: Live Preview -->
      <div class="column is-two-thirds">
        <h3 class="title is-4 acta-headline">Live Preview</h3>
        <!-- START PREVIEW -->
        <article class="message is-dark">
          <div class="message-body" id="signature_container">
            <div class="signature">
              <!-- Dynamic Name -->
              <p class="name" id="preview_name">FIRST NAME<br>LAST NAME</p>
              <!-- Dynamic Title -->
              <p class="title" id="preview_title">TITLE</p>
              <!-- Fixed Width Line Under Title -->
              <div class="title-line"></div>
              <!-- Static Address -->
              <p class="address">
                THE ST. ANTHONY, A LUXURY COLLECTION HOTEL<br>
                300 E TRAVIS ST, SAN ANTONIO, TX 78205 UNITED STATES
              </p>
              <!-- Static Phone Numbers with Dynamic Mobile -->
              <p class="phone">
                T &nbsp;210.227.4392 &nbsp;&nbsp;|&nbsp;&nbsp;
                M &nbsp;<span id="preview_mobile">000.000.0000</span> &nbsp;&nbsp;|&nbsp;&nbsp;
                F &nbsp;210.227.0915
              </p>
              <!-- Website spaced evenly between phone & logo -->
              <p class="website">
                <strong>
                  <a href="http://www.thestanthonyhotel.com/" target="_blank">www.thestanthonyhotel.com</a>
                </strong>
              </p>
              <!-- Static Logo -->
              <p class="logo">
                <img src="images/luxury-collection-sign-off.png" width="200" alt="Luxury Collection">
              </p>
              <!-- Static Awards (Times New Roman) -->
              <p class="awards">
                Four Diamond Award / <i>AAA</i>
              </p>
              <!-- Signature Footer Text (Times New Roman) -->
              <!--<p class="footer">
                Operated by Crescent Hotels and Resorts under license from
                Marriott International, Inc. or one of its affiliates.
              </p>-->
            </div>
          </div>
        </article>
        <!-- END PREVIEW -->

        <!-- COPY BUTTON -->
        <div class="controls">
          <button class="button is-primary" id="copyBtn">
            <span>Copy Signature</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once 'api/includes/footer.php';
?>
