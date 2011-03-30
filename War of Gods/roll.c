#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/time.h>
#include <sys/types.h>
#include <unistd.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <netdb.h>
#include <arpa/inet.h>

int i,good,rolling,end = 0;
int test,count;

void execute_in(char * buf, int size, int sock)
{
	printf ("%s",buf);
	
	if (strstr(buf,"__I_I__")) 
	{
		count=0;test=0;
	}
	
	if (!rolling)
	{
			if (strstr(buf,"assword")) write (sock,"Romik\n",6);
			if ( (test==0) && (strstr(buf,"t is your")) ) write (sock,"hero\n",5);
			if ( (test==1) && (strstr(buf,"t is your")) ) write (sock,"Jaegar\n",7);
			if (strstr(buf,"ake your choic"))
			{ 
				write (sock,"1\n",2);
				test=1;
			}
	
		if (strstr(buf,"Is it right ?")) write (sock,"y\n",2);
		if (strstr(buf,"meet these")) write (sock,"y\n",2);
		if (strstr(buf,"e or Femal")) write (sock,"m\n",2);
		if (strstr(buf,"like to have colors turned on")) write (sock,"y\n",2);
		if (strstr(buf,"i character")) write (sock,"y\n",2);
		if (strstr(buf,"Continue (y/q/b)")) write (sock,"q\n",2);
		if (strstr(buf,"race do you")) write (sock,"dark-elf\n",9);
		if (strstr(buf,"re you sure")) write (sock,"y\n",2);
		if (strstr(buf,"lass do you")) write (sock,"warlock\n",8);
		
		if (strstr(buf,"ess <ENTER> to contin")) 
		{
			count++;
			write (sock,"\n",1);
			if (count==2) rolling = 1;
		}
	}
	
	if ((rolling == 1)&&(strstr(buf,"Reroll")))
	{
		for (i=0;i<200;i++)
		printf ("");
		good = 0;

		if (strstr(buf,"Str: amazing")) good ++;
		if (strstr(buf,"Cha: amazing")) good ++;
		if (strstr(buf,"Dex: amazing")) good ++;
		if (strstr(buf,"Con: amazing")) good ++;
		if (strstr(buf,"Wis: amazing")) good ++;
		if (strstr(buf,"Int: amazing")) good ++;
		
		if (good == 6) 
		{
			write (sock,"n\n",2);			
		}
		else write(sock,"\n",1);	

		printf ("\n%d\n",good);
	}
		
	if (strstr(buf,"Character Background"))
	{
		good = 0;

		if (strstr(buf,"intelligent")) good ++;
		if (strstr(buf,"magic")) good ++;
		if (strstr(buf,"more luck")) good++;
		
		printf ("\nBONUSY: %d",good);
		
		// sleep(2);
		
		if (good<3)
		{
			write (sock,"\n",1);
			write (sock,"**\n",3);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"delete\n",7);
			write (sock,"yes\n",4);
			write (sock,"0\n",2);
		}
		else 
		{
			write (sock,"\n",1);
			write (sock,"**\n",3);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"\n",1);
			write (sock,"save\n",5);
			write (sock,"quit\n",5);
			end=1;
		}		
	}
		
	if (strstr(buf,"Your character has been deleted")) 
	{ 
		rolling = 0;
		count=0; 
		// sleep (1);
	} 	
	
	if (strstr(buf,"Maximum creation")) 
	{
		rolling = 0;
		count=0;
		// sleep(1);
	} 	 
	
	fflush(stdout);
}

void execute_out(char * buf, int size, int sock)
{
 	write (sock, buf, size);	
}

int main(int argc, char *argv[])
{	
	int sock;
	struct sockaddr_in saddr;
	struct hostent * he;
	fd_set rd, act;

	staring:
	he = gethostbyname("wog.zutom.sk");
	if (!he) 
	{
		fprintf (stderr, "%s: No address associated with name.\n", argv[0]);
		return -1;
	}
	saddr.sin_family = AF_INET;
	saddr.sin_addr.s_addr = *((unsigned int *)he->h_addr);
	saddr.sin_port = htons(atoi("9990"));
	sock = socket(PF_INET, SOCK_STREAM, 0);
	
	if (sock == -1) {
		fprintf (stderr, "%s: Can't create socket.\n", argv[0]);
		return -1;
	}
	
	while (connect(sock, (struct sockaddr *)&saddr,	sizeof(struct sockaddr_in)))
	{
		rolling=0;
		count=0;
		printf ("Connection estabilished.\n");
	}
	
	while (1) 
	{ 
		/* hlavny kod */
	
		FD_ZERO(&rd);
		FD_ZERO(&act);
		FD_SET(sock, &rd);
		FD_SET(sock, &act);
		FD_SET(0, &rd);
		FD_SET(0, &act);
		select(sock+1, &rd, NULL, &act, NULL);
		
		if (FD_ISSET(sock, &act)) 
		{ 
			/* connection closed */
			
			printf ("Connection closed by host.\n");
			count=0;
			return 0;
		}

		if (FD_ISSET(0, &act)) 
		
			/* Ctrl+D */
			
			return 0;
			
		if (FD_ISSET(sock, &rd)) 
		{ 
			/* data from connection */
			
			char buf[1024+1];
			int i;
			i = read(sock, buf, sizeof(buf)-1);
			buf[sizeof(buf)-1] = '\0';
			buf[i] = '\0';
			if (i <= 0) 
			{ 
				/* corrupted connection */
				
				printf ("Connection hard closed.\n");
				count=0;
				
				if (!end) goto staring; else return 0;
			}			
			
			execute_in(buf, i, sock);
		}
		
		if (FD_ISSET(0, &rd)) 
		{ 
			/* something was pressed */
			
			char buf[1024];
			int i;
			i = read(0, buf, sizeof(buf));
			if (i <= 0) 
			{ 
				/* user error */
				
				printf ("User error.\n");
				return 0;
			}
			execute_out(buf, i, sock);
		}
	}
}

