<div id="puzzleContainer"></div>

<style>
    #puzzleContainer {
    display: flex;
    flex-wrap: wrap;
    width: 500px;
    height: 500px;
    background-size: cover;
    position: relative;
    }

    #flag {
    display: none;
    }
</style>
<script>
    const puzzleContainer = document.getElementById("puzzleContainer");
    const puzzlePieces = [];
    const pieceSize = 100;
    const rows = 5;
    const cols = 5;
    // session の image_name  を取得
    const imageName = "<?php echo $_SESSION['image_name']; ?>"
    let selectedPiece = null;

    // puzzleContainerにbackground-imageを設定
    puzzleContainer.style.backgroundImage = `url(${imageName})`;

    // ピースを作成
    for (let i = 0; i < rows; i++) {
    for (let j = 0; j < cols; j++) {
        const piece = document.createElement("div");
        piece.style.width = pieceSize + "px";
        piece.style.height = pieceSize + "px";
        piece.style.backgroundPosition = `-${j * pieceSize}px -${i * pieceSize}px`;
        piece.style.position = "absolute";
        piece.addEventListener("mouseup", handleMouseUp);
        // piece.addEventListener("mousedown", handleMouseDown)
        puzzleContainer.appendChild(piece);
        puzzlePieces.push(piece);
    }
    }

    // ピースをシャッフル
    for (let i = puzzlePieces.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [puzzlePieces[i], puzzlePieces[j]] = [puzzlePieces[j], puzzlePieces[i]];
    }

    puzzlePieces.forEach((piece, index) => {
    piece.style.backgroundImage = `url(${imageName})`;
    piece.style.left = `${(index % cols) * pieceSize}px`;
    piece.style.top = `${Math.floor(index / cols) * pieceSize}px`;
    });

    function handleMouseUp(event) {
        if (selectedPiece) {
            const selectedPieceIndex = puzzlePieces.indexOf(selectedPiece);
            const currentPieceIndex = puzzlePieces.indexOf(event.target);
            const selectedPieceRow = Math.floor(selectedPieceIndex / cols);
            const selectedPieceCol = selectedPieceIndex % cols;
            const currentPieceRow = Math.floor(currentPieceIndex / cols);
            const currentPieceCol = currentPieceIndex % cols;

            if (
            (selectedPieceRow === currentPieceRow &&
                Math.abs(selectedPieceCol - currentPieceCol) === 1) ||
            (selectedPieceCol === currentPieceCol &&
                Math.abs(selectedPieceRow - currentPieceRow) === 1)
            ) {
            [puzzlePieces[selectedPieceIndex], puzzlePieces[currentPieceIndex]] = [
                puzzlePieces[currentPieceIndex],
                puzzlePieces[selectedPieceIndex],
            ];
            selectedPiece.style.left = `${currentPieceCol * pieceSize}px`;
            selectedPiece.style.top = `${currentPieceRow * pieceSize}px`;
            event.target.style.left = `${selectedPieceCol * pieceSize}px`;
            event.target.style.top = `${selectedPieceRow * pieceSize}px`;
            }

            // 選択時の赤枠とz-indexの設定を解除
            selectedPiece.style.border = "none";
            selectedPiece.style.zIndex = 0;
            selectedPiece = null;

            if (puzzlePieces.every((piece, index) => {
                const backgroundPosition = piece.style.backgroundPosition.split(" ");
                const backgroundPositionX = parseInt(backgroundPosition[0]);
                const backgroundPositionY = parseInt(backgroundPosition[1]);
                const pieceRow = Math.floor(index / cols);
                const pieceCol = index % cols;
                return (
                backgroundPositionX === -pieceCol * pieceSize &&
                backgroundPositionY === -pieceRow * pieceSize
                );
            })) {
                // delay
                setTimeout(() => {
                    // class="share"のhiddenを外す
                    document.getElementsByClassName("share")[0].hidden = false;
                    // クリックイベントの削除
                    puzzlePieces.forEach((piece) => {
                        piece.removeEventListener("mouseup", handleMouseUp);
                    });
                    // 1枚の画像に戻す
                    puzzleContainer.style.backgroundImage = `url(${imageName})`;
                    puzzleContainer.style.backgroundSize = "cover";
                    puzzleContainer.style.backgroundPosition = "center";
                    puzzleContainer.style.border = "none";
                    // ピースを削除
                    puzzlePieces.forEach((piece) => {
                        puzzleContainer.removeChild(piece);
                    });
                }, 100);
            }

        } else {
            // 選択時の赤枠とz-indexの設定
            selectedPiece = event.target;
            selectedPiece.style.zIndex = 1;
            selectedPiece.style.border = "2px solid red";
        }
    }
</script>