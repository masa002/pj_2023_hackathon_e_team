<div id="puzzleContainer"></div>
<div id="flag"></div>

<style>
    #puzzleContainer {
    display: flex;
    flex-wrap: wrap;
    width: 500px;
    height: 500px;
    background-image: url(img/image.png);
    background-size: cover;
    position: relative;
    }

    #flag {
    display: none;
    }
</style>
<script>
    // JavaScript
    const puzzleContainer = document.getElementById("puzzleContainer");
    const flag = document.getElementById("flag");
    const puzzlePieces = [];
    const pieceSize = 100;
    const rows = 5;
    const cols = 5;
    let selectedPiece = null;

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

    // Shuffle pieces
    for (let i = puzzlePieces.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [puzzlePieces[i], puzzlePieces[j]] = [puzzlePieces[j], puzzlePieces[i]];
    }

    puzzlePieces.forEach((piece, index) => {
    piece.style.backgroundImage = `url(img/image.png)`;
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
            selectedPiece.style.border = "none";
            selectedPiece.style.zIndex = 0;
            selectedPiece = null;

            // if conpleted puzzle show CONGRATULATIONS
            if (
            puzzlePieces.every(
                (piece, index) =>
                piece.style.backgroundPosition ===`-${(index % cols) * pieceSize}px -${(index / cols) * pieceSize}px`
            )
            ) {
                console.log("CONGRATULATIONS");
                flag.style.display = "block";
            }
        } else {
            selectedPiece = event.target;
            selectedPiece.style.zIndex = 1;
            selectedPiece.style.border = "2px solid red";
        }
    }
</script>