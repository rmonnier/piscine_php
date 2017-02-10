/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   test.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: rmonnier <marvin@42.fr>                    +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2017/01/12 17:08:50 by rmonnier          #+#    #+#             */
/*   Updated: 2017/01/12 17:23:48 by rmonnier         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include <utmpx.h>
#include <stdio.h>

struct s_test
{
	long l;
	char c;
};

int		main(void)
{
	struct utmpx test;

	printf("struct utmpx %d\n", sizeof(struct utmpx));
	printf("user %d\n", sizeof(test.ut_user));
	printf("user %d\n", sizeof(test.ut_id));
	printf("user %d\n", sizeof(test.ut_line));
	printf("user %d\n", sizeof(test.ut_pid));
	printf("type %d\n", sizeof(test.ut_type));
	printf("uttv %d\n", sizeof(test.ut_tv));
	printf("host %d\n", sizeof(test.ut_host));
	printf("pad %d\n\n", sizeof(test.ut_pad));
	printf("test struct %d\n", sizeof(test.ut_tv.tv_sec));
	printf("test struct %d\n", sizeof(test.ut_tv.tv_usec));
	printf("timeval %d\n", sizeof(struct s_test));

}
