import React from 'react';
import Question from './Question'
import '../css/Test.css';

class Game extends React.Component {
    render() {
      return (
        <div className="test">
          <div className="question">
            <Question />
          </div>
          <div className="reponse">
              <button>Vrai</button>
              <button>Faux</button>
          </div>
        </div>
      );
    }
  }

export default Game