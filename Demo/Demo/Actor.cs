using System;
using System.Collections.Generic;
using System.Text;

namespace Demo
{
    class Actor
    {
        public string actor_id;
        public string first_name;
        public string last_name;

        public Actor(string FirstName, string LastName)
        {
            actor_id = Guid.NewGuid().ToString();
            first_name = FirstName;
            last_name = LastName;
        }
    }
}
