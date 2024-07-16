<?php


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers: Content-Type");

// Connect to database (replace with your own database credentials)
$conn = new mysqli("localhost", "u800943294_library", "Iam_japhoo428", "u800943294_library");

if (isset($_GET["retrieve"])) {
    $sqlstr = "SELECT * FROM students ORDER BY id";
    $stmt = $conn->prepare($sqlstr);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) :
        extract($row);
?>
        <div class="slab" @click="shownew, delete(<?= $id ?>)">
            <div class="parent">
                <p><?= $topic ?></p>
                <div class="child1">
                    <p style="font-size: 10px; margin-top: 1em;" class="name"><?= $name ?> </p>
                    <p style="font-size: 10px; margin: 1em 0em;" class="name"><?= $matric ?></p>
                </div>

                <div class="det">
                    <div class="pdf">PDF</div>
                    <div class="pages"><?= $pages ?> Pages</div>
                    <p class="date">Jan 01 2023</p>
                </div>
                <div style="position: absolute; top: 50%; right: -160px; width: 250px; transform: translate(-50%, -50%); display: flex; justify-content: space-between; gap: 10px;">
                    <button style="display: flex; background: #E9F8FF; padding: 10px 20px; gap: 4px; border-radius: 28px;">
                        <svg width="18" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M6.41421 15.89L16.5563 5.74786L15.1421 4.33365L5 14.4758V15.89H6.41421ZM7.24264 17.89H3V13.6474L14.435 2.21233C14.8256 1.8218 15.4587 1.8218 15.8492 2.21233L18.6777 5.04075C19.0682 5.43128 19.0682 6.06444 18.6777 6.45497L7.24264 17.89ZM3 19.89H21V21.89H3V19.89Z" fill="#128BC7" />
                        </svg>
                        <span style="font-weight: 500; font-size: 10px; line-height: 16px; letter-spacing: -0.01em; color: #128BC7;">Edit</span>
                    </button>
                    <button class="delete" style="background: #F6EEFF;">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.79419 8.47349L8.89419 7.59849C8.69419 7.41515 8.45652 7.32749 8.18119 7.33549C7.90652 7.34415 7.67752 7.44015 7.49419 7.62349C7.31086 7.80682 7.21919 8.04015 7.21919 8.32349C7.21919 8.60682 7.31086 8.84015 7.49419 9.02349L10.0942 11.6235C10.2775 11.8068 10.5109 11.8985 10.7942 11.8985C11.0775 11.8985 11.3109 11.8068 11.4942 11.6235L14.1192 8.99849C14.3025 8.81515 14.3902 8.58582 14.3822 8.31049C14.3735 8.03582 14.2775 7.80682 14.0942 7.62349C13.9109 7.44015 13.6775 7.34415 13.3942 7.33549C13.1109 7.32749 12.8775 7.42349 12.6942 7.62349L11.7942 8.47349V5.29849C11.7942 5.01515 11.6985 4.78182 11.5072 4.59849C11.3152 4.41515 11.0775 4.32349 10.7942 4.32349C10.5109 4.32349 10.2735 4.41915 10.0822 4.61049C9.89019 4.80249 9.79419 5.04015 9.79419 5.32349V8.47349ZM6.79419 15.3235H14.8192C15.1025 15.3235 15.3359 15.2275 15.5192 15.0355C15.7025 14.8442 15.7942 14.6068 15.7942 14.3235C15.7942 14.0402 15.6982 13.8025 15.5062 13.6105C15.3149 13.4192 15.0775 13.3235 14.7942 13.3235H6.76919C6.48586 13.3235 6.25252 13.4192 6.06919 13.6105C5.88586 13.8025 5.79419 14.0402 5.79419 14.3235C5.79419 14.6068 5.88986 14.8442 6.08119 15.0355C6.27319 15.2275 6.51086 15.3235 6.79419 15.3235ZM10.7942 20.3235C9.41086 20.3235 8.11086 20.0608 6.89419 19.5355C5.67752 19.0108 4.61919 18.2985 3.71919 17.3985C2.81919 16.4985 2.10686 15.4402 1.58219 14.2235C1.05686 13.0068 0.794189 11.7068 0.794189 10.3235C0.794189 8.94015 1.05686 7.64015 1.58219 6.42349C2.10686 5.20682 2.81919 4.14849 3.71919 3.24849C4.61919 2.34849 5.67752 1.63582 6.89419 1.11049C8.11086 0.58582 9.41086 0.323486 10.7942 0.323486C12.1775 0.323486 13.4775 0.58582 14.6942 1.11049C15.9109 1.63582 16.9692 2.34849 17.8692 3.24849C18.7692 4.14849 19.4815 5.20682 20.0062 6.42349C20.5315 7.64015 20.7942 8.94015 20.7942 10.3235C20.7942 11.7068 20.5315 13.0068 20.0062 14.2235C19.4815 15.4402 18.7692 16.4985 17.8692 17.3985C16.9692 18.2985 15.9109 19.0108 14.6942 19.5355C13.4775 20.0608 12.1775 20.3235 10.7942 20.3235Z" fill="#924374" />
                        </svg>
                        <span style="font-weight: 500; font-size: 10px; line-height: 16px; letter-spacing: -0.01em; color: #924374;">Download</span>
                    </button>
                </div>
            </div>
        </div>
<?php endwhile;
}

?>