import '../styles/App.css';
import React, { useState, useEffect } from 'react';
import 'bootstrap/dist/css/bootstrap.css';
import UserList from './UserList';

function App() {

  const [users, setUsers] = useState([]);

	const getUser = async () => {
		const url = `https://dummyjson.com/users`;

		const response = await fetch(url);
		const responseJson = await response.json();

    if (responseJson.users) {
      console.log(responseJson.users[0])
			setUsers(responseJson.users)
		}
	};

	useEffect(() => {
		getUser();
	}, []);

  return (
    <div className='App'>
      <UserList users={users} />
    </div>
  );
}

export default App;
