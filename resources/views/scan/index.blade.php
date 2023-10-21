<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Scan</title>
    <script type="text/javascript" src="Resources/dynamsoft.webtwain.config.js"></script>
    <script type="text/javascript" src="Resources/dynamsoft.webtwain.initiate.js"></script>
    <link rel="stylesheet" href="Style/ds.demo.css">
</head>

<body>
    <div id="main">
        <div class="container">
            <input type="button" value="Scan" onclick="AcquireImage();" class="btn bgBlue mb15 mr20" />
            <input type="button" value="Open a local file" onclick="LoadImages();" class="btn bgBlue mb15" />
            <input type="button" value="Generate PDF" onclick="SaveScannedImagesToPDF();" class="btn bgBlue mb15" />
            <input type="button" value="Clear Scanned Images" onclick="clearScannedImages();" class="btn bgBlue mb15 mr20" />
            <input type="button" value="Show Scanned Image Count" onclick="showScannedImageCount();" class="btn bgBlue mb15 mr20" />
            <label for="docTitle">Document Title:</label>
            <input type="text" id="docTitle" placeholder="Enter document title">
            <div style="display: block; position: absolute;" class="container">
                <div id="dwtcontrolContainer" style="float: left; position:relative; margin-right:20px;"></div>
                <div id="dwtcontrolContainerLargeViewer" style="float: left; position:relative;"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function () {
            if (Dynamsoft && (!Dynamsoft.Lib.product.bChromeEdition)) {
                var ObjString = [];
                ObjString.push('<div class="p15">');
                ObjString.push("Please note that the sample doesn't work on your current browser, please use a modern browser like Chrome, Firefox, etc.");
                ObjString.push('</div>');
                Dynamsoft.DWT.ShowDialog(400, 180, ObjString.join(''));
                if (document.getElementsByClassName("dynamsoft-dialog-close"))
                    document.getElementsByClassName("dynamsoft-dialog-close")[0].style.display = "none";
            } else {
                Dynamsoft.DWT.Load();
            }
        };

        Dynamsoft.DWT.AutoLoad = false;
        Dynamsoft.DWT.RegisterEvent('OnWebTwainReady', Dynamsoft_OnReady);

        var DWObject;

        function Dynamsoft_OnReady() {
            DWObject = Dynamsoft.DWT.GetWebTwain('dwtcontrolContainer');
        }

        function AcquireImage() {
            if (DWObject) {
                DWObject.SelectSourceAsync().then(function () {
                    return DWObject.AcquireImageAsync({
                        IfShowUI: true,
                        IfCloseSourceAfterAcquire: true
                    });
                }).catch(function (exp) {
                    alert(exp.message);
                });
            }
        }

        function getDocumentName() {
            // Show a dialog to get the document name
            let docName = prompt("Please enter the document name:", "");
            if (docName === null || docName.trim() === "") {
                alert("You must provide a document name!");
                return null;
            }
            return docName;
        }
        function LoadImages() {
    if (DWObject) {
        if (DWObject.Addon && DWObject.Addon.PDF) {
            DWObject.Addon.PDF.SetResolution(300);
            DWObject.Addon.PDF.SetConvertMode(Dynamsoft.DWT.EnumDWT_ConvertMode.CM_RENDERALL);
        }
        DWObject.LoadImageEx('', 5,
            function () {
                console.log("Image loaded successfully.");
            },
            function (errorCode, errorString) {
                alert('Load Image:' + errorString);
            }
        );
    }
}
function SaveScannedImagesToPDF() {
    if (DWObject && DWObject.HowManyImagesInBuffer > 0) {
        let title = document.getElementById("docTitle").value;
        console.log(title);
        if (!title) {
            alert("Please enter a document title before saving.");
            return;
        }

        let bSave = DWObject.SaveAllAsPDF(title + '.pdf', function() {
            uploadPDFToServer(title);
        }, OnFailure);
    } else {
        alert("No images have been scanned. Please scan the images first.");
    }
}

function uploadPDFToServer(title) {
    // Create a new FormData instance
    let formData = new FormData();
    formData.append("title", title);
    formData.append("creation_date", new Date().toISOString().slice(0, 10));
    console.log(formData);
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/upload', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        alert("Document saved successfully!");
    })
    .catch((error) => {
        console.error('Error:', error);
        alert("Error while saving the document. Please try again.");
    });
}



function OnFailure(errorCode, errorString) {
    alert(errorString);
}

function clearScannedImages() {
            if (DWObject) {
                DWObject.RemoveAllImages();
                alert("All scanned images have been removed.");
            }
        }

        function showScannedImageCount() {
            if (DWObject) {
                alert(DWObject.HowManyImagesInBuffer + " images scanned.");
            }
        }
    </script>
</body>

</html>
