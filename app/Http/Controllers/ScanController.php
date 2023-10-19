<!DOCTYPE html>
<html>


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Scanner</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="Resources/dynamsoft.webtwain.config.js"></script>
    <script type="text/javascript" src="Resources/dynamsoft.webtwain.initiate.js">
    </script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .btn-scan {
            background-color: #8a2be2;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .btn-scan:hover {
            background-color: #800080;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-clear {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-clear:hover {
            background-color: #c82333;
        }

        .btn-pdf {
            background-color: #20c997;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-pdf:hover {
            background-color: #17a2b8;
        }

        #scan-container {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 20px;
        }

        #scan-container h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <input type="button" value="Scanner" onclick="AcquireImage();" class="btn btn-scan mb15 mr20" />
                    <input type="button" value="Charger" onclick="LoadImages();" class="btn btn-secondary mb15" />
                    <input type="button" value="Genérer PDF" onclick="SaveScannedImagesToPDF();" class="btn btn-secondary mb15" />
                    <input type="button" value="Effacer" onclick="clearScannedImages();" class="btn btn-clear mb15 mr20" />
                    <input type="button" value="Compteur" onclick="showScannedImageCount();" class="btn btn-secondary mb15 mr20" />
                </div>
            </div>
            <br>

            <div class="radio-group">
                <input type="radio" id="congeSansSold" name="type" value="congé sans sold" onchange="toggleFilter()">
                <label for="congeSansSold">Contrat employé</label>
            </div>
            <div class="radio-group">
                <input type="radio" id="congeSansSold" name="type" value="congé sans sold" onchange="toggleFilter()">
                <label for="congeSansSold">Passation des consignes</label>
            </div>
            <div class="radio-group">
                <input type="radio" id="congeSansSold" name="type" value="congé sans sold" onchange="toggleFilter()">
                <label for="congeSansSold">Congé Sans Solde</label>
            </div>

            <div class="radio-group">
                <input type="radio" id="maternite" name="type" value="Maternité" onchange="toggleFilter()">
                <label for="maternite">Maternité</label>
            </div>

            <div class="radio-group">
                <input type="radio" id="evenementFamilar" name="type" value="Evenement Familar" onchange="toggleFilter()">
                <label for="evenementFamilar">Evènement Familal</label>
            </div>

            <div class="radio-group">
                <input type="radio" id="congéannuel" name="type" value="congé annuel" onchange="toggleFilter()">
                <label for="congéannuel">Congé Annuel</label>
            </div>

            <div id="filterContainer" style="display:none;">
                <label for="filter">Filter:</label>
                <select id="filter">
                    <option value="mariage">Mariage</option>
                    <option value="décét">Décès</option>
                    <option value="paternité">Paternité</option>
                    <!-- ... Add other options if needed ... -->
                </select>
            </div>
            <br>
            <label for="creationDate">Date de création:</label>
            <input type="date" id="creationDate" placeholder="Enter creation date">
            <label for="docTitle">Titre du document:</label>
            <input type="text" id="docTitle" placeholder="Entrer un titre">
            <div style="display: block; position: absolute;" class="container">
                <div id="dwtcontrolContainer" style="float: left; position:relative; margin-right:20px;"></div>
                <div id="dwtcontrolContainerLargeViewer" style="float: left; position:relative;"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function() {
            if (Dynamsoft && (!Dynamsoft.Lib.product.bChromeEdition)) {
                var ObjString = [];
                ObjString.push('<div class="p15">');
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
                DWObject.SelectSourceAsync().then(function() {
                    return DWObject.AcquireImageAsync({
                        IfShowUI: true,
                        IfCloseSourceAfterAcquire: true
                    });
                }).catch(function(exp) {
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

        function toggleFilter() {
            const filterContainer = document.getElementById('filterContainer');
            const evenementFamilarRadio = document.getElementById('evenementFamilar');
            if (evenementFamilarRadio.checked) {
                filterContainer.style.display = 'block';
            } else {
                filterContainer.style.display = 'none';
            }
        }

        function LoadImages() {
            if (DWObject) {
                if (DWObject.Addon && DWObject.Addon.PDF) {
                    DWObject.Addon.PDF.SetResolution(300);
                    DWObject.Addon.PDF.SetConvertMode(Dynamsoft.DWT.EnumDWT_ConvertMode.CM_RENDERALL);
                }
                DWObject.LoadImageEx('', 5,
                    function() {
                        console.log("Image loaded successfully.");
                    },
                    function(errorCode, errorString) {
                        alert('Load Image:' + errorString);
                    }
                );
            }
        }

        function SaveScannedImagesToPDF() {
            let title = document.getElementById("docTitle").value;
            let creationDate = document.getElementById("creationDate").value;
            let filter = null;
            let typeElement = document.querySelector('input[name="type"]:checked');
            let type = typeElement ? typeElement.value : null;

            if (!type) {
                alert("Please select a type.");
                return;
            }
            if (type === "Evenement Familar") {
                filter = document.getElementById("filter").value;

                if (!filter) {
                    alert("Please select a filter option before saving.");
                    return;
                }
            }

            // Check the title and date before proceeding
            if (!title) {
                alert("Please enter a document title before saving.");
                return;
            }
            // Check the title and date before proceeding
            if (!title) {
                alert("Please enter a document title before saving.");
                return;
            }
            if (!creationDate) {
                alert("Please enter a creation date before saving.");
                return;
            }

            if (DWObject && DWObject.HowManyImagesInBuffer > 0) {
                // First, let's save the PDF to the local machine
                DWObject.SaveAllAsPDF(title + '.pdf', function() {
                    // Once saved, get the indices of all images in the buffer
                    let indices = [];
                    for (let i = 0; i < DWObject.HowManyImagesInBuffer; i++) {
                        indices.push(i);
                    }

                    // Now, convert those images to a blob
                    DWObject.ConvertToBlob(
                        indices,
                        Dynamsoft.DWT.EnumDWT_ImageType.IT_PDF,
                        function(blob) {
                            uploadPDFToServer(title, blob);
                        },
                        OnFailure
                    );
                }, OnFailure);
            } else {
                alert("No images have been scanned. Please scan the images first.");
            }
        }


        function uploadPDFToServer(title, pdfBlob) {
            let formData = new FormData();
            formData.append("title", title);
            let creationDate = document.getElementById("creationDate").value;
            let type = document.querySelector('input[name="type"]:checked').value;

            if (type === "Evenement Familar") {
                let filter = document.getElementById("filter").value;
                formData.append("filter", filter);
            }

            formData.append("creation_date", creationDate);
            formData.append("type", type);
            formData.append("pdf_file", pdfBlob, title + ".pdf"); // Add the blob to formData with file name

            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch('/upload', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData
                })
                .then(response => {
                    if (response.status === 409) {
                        // Handle naming conflict
                        let newTitle = prompt("The title already exists. Please provide a different title:", title);
                        if (newTitle && newTitle.trim() !== "") {
                            document.getElementById("docTitle").value = newTitle; // Update the title in the input field
                            uploadPDFToServer(newTitle, pdfBlob); // Recursive call with the new title
                        } else {
                            alert("Please provide a valid title.");
                        }
                        throw new Error("Title conflict"); // This will skip the next "then" statements and jump to "catch"
                    }
                    return response.json(); // Parse the rest of the response as JSON
                })
                .then(data => {
                    console.log('Success:', data);
                    alert("Document saved successfully!");
                })
                .catch((error) => {
                    // We don't want to show an error alert for the title conflict since we're handling it.
                    if (error.message !== "Title conflict") {
                        console.error('Error:', error);
                        alert("Error while saving the document. Please try again.");
                    }
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