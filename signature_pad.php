<style>
	*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  height: 70vh;
  width: 100%;
  margin: 0;
  padding: 32px 16px;
  top:-27px !important;
}

.signature-pad {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  font-size: 10px;
  width: 100%;
  height: 100%;
  max-width: 450px;
  max-height: 302px;
  border: 1px solid #e8e8e8;
  background-color: #fff;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;
  border-radius: 4px;
  padding: 16px;
}

.signature-pad::before,
.signature-pad::after {
  position: absolute;
  z-index: -1;
  content: "";
  width: 40%;
  height: 10px;
  bottom: 10px;
  background: transparent;
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4);
}

.signature-pad::before {
  left: 20px;
  -webkit-transform: skew(-3deg) rotate(-3deg);
          transform: skew(-3deg) rotate(-3deg);
}

.signature-pad::after {
  right: 20px;
  -webkit-transform: skew(3deg) rotate(3deg);
          transform: skew(3deg) rotate(3deg);
}

.signature-pad--body {
  position: relative;
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  border: 1px solid #f4f4f4;
}

canvas {
  position: absolute;
  left: 0;
  top: 28px;
  width: 100%;
  height: 100%;
  border-radius: 4px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.02) inset;
}

.signature-pad--footer {
  color: #C3C3C3;
  text-align: center;
  font-size: 1.2em;
  margin-top: 8px;
}

.signature-pad--actions {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  margin-top: 8px;
}

#github img {
  border: 0;
}

#fileupload {
  display: none;
}

form {
  display: table-row;
  margin-right: 5px;
}

span[role=button] {
  display: table-cell;
  font-size: 1.2em;
}

span[role=button],
button {
  cursor: pointer;
  background-color: #e1e1e1;
  color: #000000;
  border: none;
  padding: 8px;
  margin-bottom: 8px;
}

@media (max-width: 940px) {
  #github img {
    width: 90px;
    height: 90px;
  }
}

</style>
  <div id="signature-pad" class="signature-pad" style="margin:auto;">
    <div class="signature-pad--body">
      <canvas width="130" height="50">
        Update your browser to support the canvas element!
      </canvas>
    </div>
    <div class="signature-pad--footer">
      <div class="description">Sign above</div>

      <div class="signature-pad--actions">
        <form action="#" enctype="multipart/form-data">
          <label for="fileupload" id="buttonlabel">
            <span role="button" aria-controls="filename" tabindex="0" style="display:none">
              Choose a background image
            </span>
          </label>
          <input type="file" id="fileupload" accept="image/*">
		  
        </form>
        <div>
		  <button type="button" style="display:none" class="button save" data-action="save-png">Save as PNG</button>
          <button type="button" style="display:none" class="button save" data-action="save-jpg">Save as JPG</button>
          <button type="button" class="button" data-action="change-color" style="display:none">
		  Change color</button>
          <button type="button" class="button" data-action="undo" style="display:none">Undo</button>
		  <button type="button" style="display:" class="button clear" data-action="clear">Clear</button>
        </div>
      </div>
    </div>
  </div>
  
