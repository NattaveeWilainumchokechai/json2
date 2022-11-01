<html>
    <head>
        <script>
            async function getDataFromAPI(){
                let response = await fetch('https://data.go.th/dataset/296f32c6-8c7e-4a54-ade0-0913d35d3168/resource/d132638d-a243-4829-aed8-10ed4fad917f/download/priv_hos.json')
                let rawData = await response.text()
                let objectData = JSON.parse(rawData)
                let result = document.getElementById('result')

                for (let i = 0; i < objectData.features.length; i++) {
                    if(objectData.features[i].properties.num_bed<100){
                        let content = 'ชื่อโรงพยาบาล :' + objectData.features[i].properties.name + '('
                        content += objectData.features[i].properties.num_bed + ' เตียง)'
                        let li = document.createElement('li')
                        li.innerHTML = content
                        document.getElementById("result").style.listStyle = "decimal";
                        result.appendChild(li)
                    } 
                }
            }
            getDataFromAPI()
        </script>
    </head>
    <body>
        <h1>โรงพยาบาลเอกชนในกทม.</h1>
        <ul id="result"></ul>
    </body>
</html>