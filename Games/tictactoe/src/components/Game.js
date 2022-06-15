import React from 'react';
import Board from './Board';
import ResetBTN from './ResetBTN';

class Game extends React.Component {

  renderResetBtn() {
    return (
      <ResetBTN
        onClick={() => this.render()}
      />
    );
  }

  render() {
    return (
      <div className="game">
        <div className="game-board">
          <Board />
        </div>
        <div className="game-info">
            {/* <ResetBTN /> */}
        </div>
      </div>
    );
  }
}

export default Game