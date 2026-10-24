<!-- Enquiry dialog -->
  <div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content enquiry-modal">
        <div class="modal-header">
          <div>
            <span class="eyebrow">Pristine Engineering Services</span>
            <h2 class="modal-title" id="enquiryModalLabel">How Can We Help You?</h2>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close enquiry form"></button>
        </div>
        <div class="modal-body">
          <p class="enquiry-modal-intro">Tell us what you need. Our team will help you find the right electrical insulation products and solutions.</p>
          <form id="contactModalForm" novalidate>
            <label for="contactModalName">Your name</label>
            <input class="form-control" id="contactModalName" name="name" autocomplete="name" required>
            <label for="contactModalPhone">Mobile number</label>
            <div class="phone-field">
              <span class="cc">+91</span>
              <input class="form-control" id="contactModalPhone" name="phone" type="tel" inputmode="numeric" autocomplete="tel-national" maxlength="10" pattern="[6-9][0-9]{9}" required>
            </div>
            <label for="contactModalRequirement">How can we help?</label>
            <textarea class="form-control" id="contactModalRequirement" name="requirement" rows="3" required></textarea>
            <p class="form-msg" id="contactModalStatus" role="status" aria-live="polite">WhatsApp opens a prepared message; it is not sent automatically. Configure its destination in assets/js/custom.js.</p>
            <div class="enquiry-modal-actions">
              <button class="btn-whatsapp" type="button" data-enquiry-action="whatsapp"><i class="bi bi-whatsapp" aria-hidden="true"></i> Continue on WhatsApp</button>
              <button class="btn-brand" type="button" data-enquiry-action="email"><i class="bi bi-envelope" aria-hidden="true"></i> Send by Email</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- ======================VIDEO MODAL — placeholder until a company video is supplied====================== -->
  <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content video-modal">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="videoModalLabel">Pristine Engineering — Company Video</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <div class="ratio ratio-16x9" id="videoHolder"></div>
        </div>
      </div>
    </div>
  </div>