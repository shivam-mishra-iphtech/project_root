<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Centered Circular Image</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: start;
            min-height: 100vh;
        }

        section {
            padding-top: 6.25rem;
            text-align: center;
            width: 100%;
        }

        .blurb-box {
            max-width: 15.625rem;
            width: 90%;
            background-color: green;
            position: relative;
            margin: 0 auto;
            border-radius: 10px 0px 0px 10px;
            padding-top: 5.625rem;
            padding-bottom: 1.25rem;
        }

        .blurb-image-1 {
            width: 9.375rem;
            height: 9.375rem;
            background-color: white;
            border-radius: 50%;
            padding: 10px;
            position: absolute;
            top: -4.6875rem;
            left: 50%;
            transform: translateX(-50%);
            box-sizing: border-box;
            z-index: 1;
        }

        .blurb-image-2 {
            width: 100%;
            height: 100%;
            background-color: white;
            border-radius: 50%;
            border: 10px solid yellow;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1.25rem;
            overflow: hidden;
            box-shadow: inset 2px 0px 3px rgba(0, 0, 0, 0.15);
        }


        .blurb-image-2 img {
            width: auto;
            height: auto;
            display: block;
        }

        .blurb-content-area {
            padding: 0 1.25rem;
            text-align: center;
            color: white;
        }

        .blurb-content-area h4 {
            margin: 0.625rem 0 0.3125rem;
            padding: 10px;
            font-family: sora;
        }

        .blurb-content-area p {
            margin: 0;
            font-size: 0.875rem;
            line-height: 1.7;
            font-family: manrope;
        }
    </style>
</head>

<body>
    <section>
        <div class="blurb-box">
            <div class="blurb-image-1">
                <div class="blurb-image-2">
                    <img src="http://localhost/shivam/projects/sourcecode/iphTechnologies/wp-content/uploads/2025/06/lifestyle_6749718-1.png"
                        alt="Image" />
                </div>
            </div>
            <div class="blurb-content-area">
                <h4>Hello my friends</h4>
                <p>
                    You know my previous history. According to my habits and style of living in regular life, the image
                    of success is coming from the future.
                </p>
            </div>
        </div>
    </section>
</body>

</html>