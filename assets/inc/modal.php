<!-- GLOBAL ENQUIRY MODAL START -->
  <div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content enquiry-modal">
        <div class="modal-header">
          <div>
            <span class="eyebrow">Electrical Insulation &amp; Cable Accessories</span>
            <h2 class="modal-title" id="enquiryModalLabel">How Can We Help You?</h2>
            <p>Share a few details so our team can understand your requirement.</p>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close enquiry form"></button>
        </div>
        <div class="modal-body">
          <p class="enquiry-modal-intro">We’ll prepare a message for your chosen contact app. You can review and send it there.</p>
          <form id="contactModalForm" novalidate>
            <div class="enquiry-fields">
              <label for="contactModalName"><span class="field-label">Full name <em aria-hidden="true">*</em></span>
                <input class="form-control" id="contactModalName" name="name" autocomplete="name" required>
              </label>
              <label for="contactModalCompany"><span class="field-label">Company name</span>
                <input class="form-control" id="contactModalCompany" name="company" autocomplete="organization">
              </label>
              <label for="contactModalPhone"><span class="field-label">Mobile number <em aria-hidden="true">*</em></span>
                <span class="phone-field">
                  <span class="cc">+91</span>
                  <input class="form-control" id="contactModalPhone" name="phone" type="tel" inputmode="numeric" autocomplete="tel-national" maxlength="10" pattern="[6-9][0-9]{9}" aria-describedby="contactModalPhoneHint" required>
                </span>
                <small id="contactModalPhoneHint">Enter a 10-digit Indian mobile number.</small>
              </label>
              <label for="contactModalEmail"><span class="field-label">Email address <em aria-hidden="true">*</em></span>
                <input class="form-control" id="contactModalEmail" name="email" type="email" autocomplete="email" required>
              </label>
              <label for="contactModalProduct"><span class="field-label">Product / service interest</span>
                <select class="form-control" id="contactModalProduct" name="product">
                  <option value="">Choose an option</option>
                  <option>Heat Shrinkable Sleeves</option>
                  <option>Right Angle Boots</option>
                  <option>Busbar Sleeves</option>
                  <option>Separable Connectors</option>
                  <option>Cable Jointing Kits</option>
                  <option>Heat Shrinkable Joints</option>
                  <option>Outdoor Termination Kits</option>
                  <option>Repair Services</option>
                  <option>Other Accessories</option>
                </select>
              </label>
              <label class="field-full" for="contactModalRequirement"><span class="field-label">Requirement details <em aria-hidden="true">*</em></span>
                <textarea class="form-control" id="contactModalRequirement" name="requirement" rows="3" required></textarea>
              </label>
            </div>
            <p class="form-msg" id="contactModalStatus" role="status" aria-live="polite">Your enquiry is not sent automatically. Review and send the prepared message in your email or WhatsApp app.</p>
            <div class="enquiry-modal-actions">
              <button class="btn-whatsapp" type="submit" name="enquiryAction" value="whatsapp"><i class="bi bi-whatsapp" aria-hidden="true"></i> Continue on WhatsApp</button>
              <button class="btn-brand" type="submit" name="enquiryAction" value="email"><i class="bi bi-envelope" aria-hidden="true"></i> Prepare Email Draft</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- GLOBAL ENQUIRY MODAL END -->

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