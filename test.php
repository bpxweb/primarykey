

<!DOCTYPE HTML>
<head>
  <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
  <script src="contact.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
  <form id="contactForm">
    <input type="text" id="name" placeholder="Your name..."/>
    <br>
    <input type="text" id="email" placeholder="Your email..."/>
    <br>
    <textarea id="message" placeholder="Your message..."></textarea>
    <br>
    <div class="g-recaptcha" data-sitekey="6LeatlUUAAAAAL4am4SXtq1KedNC72HG7Mv5CsPI"></div>
    <br>
    <button type="submit" class="button">Submit</button>
  </form>
</body>